Symfony Demo Application
========================

The "Symfony Demo Application" is a reference application created to show how
to develop applications following the [Symfony Best Practices][1].

You can also learn about these practices in [the official Symfony Book][5].


## API Platform
- normalizationContext: ['groups' => ['read:comment']]
- denormalizationContext: ['groups' => ['write:comment']]
- collectionOperations: ['GET']
- itemOperations: ['GET']