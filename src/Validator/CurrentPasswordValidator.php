<?php

namespace App\Validator;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class CurrentPasswordValidator extends ConstraintValidator
{
    public function __construct(
      private UserPasswordHasherInterface $passwordHasher,
      private Security $security,
    ) {}

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof CurrentPassword) {
            throw new UnexpectedTypeException($constraint, CurrentPassword::class);
        }

        /* @var CurrentPassword $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        $user = $this->security->getUser();

        if (!$user instanceof UserInterface) {
            return;
        }

        if (!$this->passwordHasher->isPasswordValid($user, $value)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation()
            ;
        }
    }
}
