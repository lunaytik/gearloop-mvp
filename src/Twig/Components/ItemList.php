<?php

namespace App\Twig\Components;

use App\Entity\Category;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\ItemRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class ItemList
{
    use DefaultActionTrait;

    #[LiveProp(writable: true, url: true)]
    public int $page = 1;

    #[LiveProp(writable: true, url: true)]
    public ?string $rootCategory = null;

    #[LiveProp(writable: true, url: true)]
    public ?string $subcategory = null;

    #[LiveProp(writable: true, url: true)]
    public string $sort = 'latest';

    #[LiveProp(writable: true, url: true)]
    public ?string $search = null;

    // Get current user kits to display them on profile
    #[LiveProp(writable: false)]
    public ?User $currentUser = null;

    #[LiveProp(writable: true, url: true)]
    public ?string $status = null;

    #[LiveProp(writable: false)]
    public bool $showReset = true;

    #[LiveProp(writable: false)]
    public bool $suggestionPage = false;

    public const int ITEMS_PER_PAGE = 12;

    public function __construct(
        private ItemRepository $itemRepository,
        private CategoryRepository $categoryRepository,
    ) {}

    public function getItems(): array
    {
        // force page to be at least 1
        $this->page = max(1, $this->page);

        $criteria = [
            'rootCategory' => $this->retrieveCategory($this->rootCategory),
            'subcategory' => $this->retrieveCategory($this->subcategory),
            'search' => $this->search,
            'sort' => $this->sort,
            'page' => $this->page,
            'limit' => self::ITEMS_PER_PAGE,
        ];

        if ($this->suggestionPage) {
            $criteria['status'] = $this->status;
        }

        if ($this->currentUser) {
            return $this->itemRepository->findCurrentUserActiveItems(
                $this->currentUser,
                [...$criteria, 'status' => $this->status]
            );
        }

        return $this->itemRepository->findActiveItems($criteria);
    }

    public function getItemsCount(): int
    {
        $criteria = [
            'rootCategory' => $this->retrieveCategory($this->rootCategory),
            'subcategory' => $this->retrieveCategory($this->subcategory),
            'search' => $this->search,
        ];

        if ($this->suggestionPage) {
            $criteria['status'] = $this->status;
        }

        if ($this->currentUser) {
            return $this->itemRepository->countCurrentUserActiveItems(
                $this->currentUser,
                [...$criteria, 'status' => $this->status]
            );
        }

        return $this->itemRepository->countActiveItems(
            $criteria
        );
    }

    public function getRootCategories(): array
    {
        return $this->categoryRepository->findRootCategories();
    }

    public function getSubCategories(): array
    {
        return $this->categoryRepository->findSubcategories($this->retrieveCategory($this->rootCategory));
    }

    public function getMaxPage(): int
    {
        return ceil($this->getItemsCount() / self::ITEMS_PER_PAGE);
    }

    public function hasFilters(): bool
    {
        return $this->rootCategory || $this->subcategory || $this->search || $this->status;
    }

    #[LiveAction]
    public function resetFilters(): void
    {
        $this->rootCategory = null;
        $this->subcategory = null;
        $this->sort = 'latest';
        $this->search = null;
        $this->page = 1;

        if ($this->currentUser) {
            $this->status = null;
        }
    }

    private function retrieveCategory(?string $category): ?Category
    {
        if (!$category) {
            return null;
        }

        return $this->categoryRepository->findOneBy(['slug' => $category]);
    }
}
