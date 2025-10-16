<?php

namespace App\Security\Voter;

use App\Entity\Kit;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

final class KitVoter extends Voter
{
    public const string EDIT = 'KIT_EDIT';
    public const string DELETE = 'KIT_DELETE';
    public const string VIEW = 'KIT_VIEW';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, [self::EDIT, self::DELETE, self::VIEW])
            && $subject instanceof Kit;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token, ?Vote $vote = null): bool
    {
        $user = $token->getUser();

        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface && $attribute !== self::VIEW) {
            return false;
        }

        // if the user is an admin, grant access
//        if (in_array('ROLE_ADMIN', $user->getRoles()))
//        {
//            return true;
//        }

        return match($attribute) {
            self::VIEW => $subject->getOwner() === $user || $subject->isPublic(),
            self::EDIT, self::DELETE => $subject->getOwner() === $user,
            default => false
        };
    }
}
