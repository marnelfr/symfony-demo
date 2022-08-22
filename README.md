Symfony Demo Application
========================

The "Symfony Demo Application" is a reference application created to show how
to develop applications following the [Symfony Best Practices][1].

You can also learn about these practices in [the official Symfony Book][5].


# API Platform
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

## Create resource
It's made by the ``collectionOperation`` ``POST`` method.\
We can even use a custom controller to fill our entity in the 
creation process:
````php
collectionOperations: [
    'POST' => [
        'security' => "is_granted('IS_AUTHENTICATED_FULLY')",
        'controller' => \App\Controller\Api\CommentCreateController::class
    ]
],
````
The controller should then be invokable. It receives our entity as
argument and should return it after filling it.\
Dependency injections are done via the constructor.

## Edit a resource
It's made by the ``itemOperation`` ``PUT`` or ``DELETE`` method.
````php 
itemOperations: [
    'PUT' => [
        'security' => "is_granted('COMMENT_EDIT', object)"
    ],
    'DELETE' => [
        'security' => "is_granted('COMMENT_EDIT', object)"
    ]
]
````

## Voter
They can be used to grant access to our users.\
They are created thanks to the command ``make:voter``.
A voter has 2 methods: 
- ``supports``: returns ``true`` if the user is allowed to perform the operation
- ``voteOnAttribute``: makes a deeper verification based on our object 
attributes to check if the action can be proceeded.