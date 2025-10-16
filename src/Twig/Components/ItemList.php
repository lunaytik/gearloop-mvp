<?php

namespace App\Twig\Components;

use App\Entity\Category;
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

    public const int ITEMS_PER_PAGE = 12;

    public function __construct(
        private ItemRepository $itemRepository,
        private CategoryRepository $categoryRepository,
    ) {}

    public function getItems(): array
    {
        return $this->itemRepository->findActiveItems([
            'rootCategory' => $this->retrieveCategory($this->rootCategory),
            'subcategory' => $this->retrieveCategory($this->subcategory),
            'search' => $this->search,
            'sort' => $this->sort,
            'page' => $this->page,
            'limit' => self::ITEMS_PER_PAGE,
        ]);
    }

    public function getItemsCount(): int
    {
        return $this->itemRepository->countActiveItems([
            'rootCategory' => $this->retrieveCategory($this->rootCategory),
            'subcategory' => $this->retrieveCategory($this->subcategory),
            'search' => $this->search,
        ]);
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
        return $this->rootCategory || $this->search;
    }

    #[LiveAction]
    public function resetFilters(): void
    {
        $this->rootCategory = null;
        $this->sort = 'latest';
        $this->search = null;
        $this->page = 1;
    }

    private function retrieveCategory(?string $category): ?Category
    {
        if (!$category) {
            return null;
        }

        return $this->categoryRepository->findOneBy(['slug' => $category]);
    }
}
