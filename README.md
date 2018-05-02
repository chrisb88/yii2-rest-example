# Yii REST example

A REST example for Yii I created for a job application.

## Requirements

- PHP 7
- Composer

## Installation

- Export or checkout the files
- run `composer update`
- run `php yii serve --port=8888` to start the php build in web server *(if you use another port
you also have to change the test suites config files)*

## Api Doc

To manually test the api, fire up [Postman](https://www.getpostman.com/) or the like.
The response is always JSON, regardless of the Accept-Encoding header.

### Show all categories
```
GET api/v1/categories
```

### Get a category by id
```
GET api/v1/categories/:id
```

You can expand the category to show it's *children* or *parent* (if any):
```
GET api/v1/categories/:id?expand=children
```

```
GET api/v1/categories/:id?expand=parent
```

```
GET api/v1/categories/:id?expand=children,parent
```

### Get a category by it's slug
```
GET api/v1/categories/:slug
```

Here you can also expand the query.

### Add a category
```
POST api/v1/categories
```
Body should be a valid application/json:
```json
{
  "name":"new category",
  "slug":"new-cat",
  "parentCategory":null,
  "isVisible": 1
}
```

Required are name and slug, where the slug must be unique in all categories.

### Update a category
```
PATCH api/v1/categories/:id
```
```
PUT api/v1/categories/:id
```
Body should be a valid application/json:
```json
{
  "isVisible": 0
}
```

### Delete a category
```
DELETE api/v1/categories/:id
```

## Testing

Run tests:
```
vendor\bin\codecept run
```

or with coverage report:
```
vendor\bin\codecept run --coverage --coverage-html
```

You can then find the coverage report in
```
tests/_output/coverage/
```

## License
Licensed under the [MIT license](https://github.com/chrisb88/yii2-rest-example/blob/master/LICENSE.md).