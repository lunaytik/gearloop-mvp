<?php

namespace App\Twig\Components;

use App\Entity\User;
use App\Repository\KitRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class KitList
{
    use DefaultActionTrait;

    #[LiveProp(writable: true, url: true)]
    public int $page = 1;

    #[LiveProp(writable: true, url: true)]
    public ?string $activity = null;

    #[LiveProp(writable: true, url: true)]
    public ?string $season = null;

    #[LiveProp(writable: true, url: true)]
    public string $sort = 'latest';

    #[LiveProp(writable: true, url: true)]
    public ?string $search = null;

    // Get current user kits to display them on profile
    #[LiveProp(writable: false)]
    public ?User $currentUser = null;

    #[LiveProp(writable: true, url: true)]
    public ?string $visibility = null;

    private const int ITEMS_PER_PAGE = 6;

    public function __construct(
        private KitRepository $kitRepository,
    ) {}

    public function getKits(): array
    {
        // force page to be at least 1
        $this->page = max(1, $this->page);

        $criteria = [
            'activityType' => $this->activity,
            'season' => $this->season,
            'sort' => $this->sort,
            'search' => $this->search,
            'page' => $this->page,
            'limit' => self::ITEMS_PER_PAGE,
        ];

        if ($this->currentUser) {
            return $this->kitRepository->findCurrentUserKits(
                $this->currentUser,
                [...$criteria, 'visibility' => $this->visibility]
            );
        }

        return $this->kitRepository->findPublicKits($criteria);
    }

    public function getTotalKits(): int
    {
        $criteria = [
            'activityType' => $this->activity,
            'season' => $this->season,
            'search' => $this->search,
        ];

        if ($this->currentUser) {
            return $this->kitRepository->countCurrentUserKits(
                $this->currentUser,
                [...$criteria, 'visibility' => $this->visibility]
            );
        }

        return $this->kitRepository->countPublicKits($criteria);
    }

    public function getMaxPage(): int
    {
        return ceil($this->getTotalKits() / self::ITEMS_PER_PAGE);
    }

    public function hasFilters(): bool
    {
        return $this->activity || $this->season || $this->search || $this->visibility;
    }

    #[LiveAction]
    public function resetFilters(): void
    {
        $this->activity = null;
        $this->season = null;
        $this->sort = 'latest';
        $this->search = null;
        $this->page = 1;

        if ($this->currentUser) {
            $this->visibility = null;
        }
    }
}
