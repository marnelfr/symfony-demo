Symfony Demo Application
========================

The "Symfony Demo Application" is a reference application created to show how
to develop applications following the [Symfony Best Practices][1].

You can also learn about these practices in [the official Symfony Book][5].


## API Platform
- ApiResource
  - normalizationContext: ['groups' => ['read:comment']]
  - denormalizationContext: ['groups' => ['write:comment']]
  - collectionOperations: ['GET']
  - itemOperations: ['GET']
  - order: ['publishedAt' => 'DESC'],
  - paginationPartial: true // for light pagination without total item,...
- ApiFilter
  - filterClass: not named argument, eg: SearchFilter::class
  - properties: ['post' => 'exact']
  
It's possible to personalize the content rendered by an endpoint:
````php
itemOperations: [
    'GET' => [
        'normalization_context' => [
            'groups' => ['read:comment', 'read:full:comment']
        ]
    ]
]
````