-   Cluster

    -   id
    -   clusterName

-   User

    -   id
    -   email
    -   password
    -   profile_image
    -   DOB
    -   bio
    -   clusterID

-   ThreadCategory

    -   id
    -   categoryName

-   Thread

    -   id
    -   user_id
    -   title
    -   created_at
    -   description
    -   threadCategoryId

-   Comment

    -   id
    -   user_id
    -   description
    -   threadID

-   RequestCategory

    -   id
    -   categoryName

-   Request

    -   id
    -   user_id
    -   title
    -   created_at
    -   description
    -   status (1 : Not solved, 2 : In Progress, 3 : Solved)
    -   requestCategoryId
