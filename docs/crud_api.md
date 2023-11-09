# CRUD APIs
## CREATE
URL: `http://localhost:80/movie`
* Method: POST
```
{
    "title": "Matrix",
    "yearReleased": 1990,
    "avgRating": 5.0
}
```

## READ
URL: `http://localhost:80/movie/{id}`
* Method: GET

## UPDATE
URL: `http://localhost:80/movie`
* Method: PATCH
```
{
    "id": 1,
    "title": "Matrix 2",
    "yearReleased": 2015,
    "avgRating": 4.0
}
```

## DELETE
URL: `http://localhost:80/movie/{id}`
* Method: DELETE
