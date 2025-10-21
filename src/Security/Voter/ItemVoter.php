<?php

namespace App\Security\Voter;

use App\Entity\Kit;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

final class ItemVoter extends Voter
{
    public const string EDIT = 'ITEM_EDIT';
    public const string DELETE = 'ITEM_DELETE';
    public const string VALIDATION = 'ITEM_VALIDATION';
    public const string SOFT_DELETE = 'ITEM_SOFT_DELETE';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, [self::EDIT, self::DELETE, self::SOFT_DELETE, self::VALIDATION])
            && $subject instanceof \App\Entity\Item;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token, ?Vote $vote = null): bool
    {
        $user = $token->getUser();

        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // if the user is an admin, grant access
//        if (in_array('ROLE_ADMIN', $user->getRoles()))
//        {
//            return true;
//        }

        return match($attribute) {
            self::EDIT,  => $subject->getCreatedAt() === $user || $user->isAdmin(),
            self::SOFT_DELETE, self::DELETE, self::VALIDATION => $user->isAdmin(),
            default => false
        };
    }
}
