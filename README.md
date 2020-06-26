<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Faydety End-points

The project acts as webservice endpoints

##Install
```
$ docker-compose up -d
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan config:cache
$ docker-compose exec app php artisan migrate:fresh
$ docker-compose exec app php serve
```

##Test
```
$ docker-compose exec app php artisan test
```

##Usage
####Create User:
```
POST /api/user
```
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `first_name` | `string` | **Required**. first name |
| `last_name` | `string` | **Required**. first name |
| `country_code` | `string` | **Required**. `eg,au` |
| `phone_number` | `string` | **Required**. phone number |
| `gender` | `string` | **Required**. `male,female` |
| `birthdate` | `string` | **Required**. birthdate |
| `email` | `string` | **Required**. email |
| `password` | `string` | **Required**. password |
| `avatar` | `file` | **Required**. avatar |

```
{
  "data": {
    "id": 2,
    "first_name": "ahmed",
    "last_name": "ahmed",
    "country_code": "eg",
    "phone_number": "+201000000",
    "gender": "male",
    "birthdate": "2020-06-25"
  }
}
```

####Generate Token:
```
POST /api/api-token/generate
```
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `phone_number` | `string` | **Required**. phone number |
| `password` | `string` | **Required**. password |

```
{
  "auth-token": "MMqwM6Wx6qUJq0sJvyuCnzqsBKsk5TyPIgXnS8XzzIgNgXIKMxpxdTepzUDo"
}
```

####Add status:
```
POST /api/user/status
```
| Parameter | Type | Description |
| :--- | :--- | :--- |
| `status` | `string` | **Required**. status |

```
{
  "id": 2,
  "status": "test",
  "user_id": 2,
  "updated_at": "2020-06-26T17:37:26.000000Z",
  "created_at": "2020-06-26T17:37:26.000000Z",
}
```