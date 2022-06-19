
# Kubilabs Test

**Postman File:** Kubilabs Test.postman_collection.json


## Demo

Demo URL

```url
http://206.189.8.237/
```


## API Reference

#### Login User

```http
  POST /api/v1/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email`   | `string` | **Required**. Your Email   |
| `password`   | `string` | **Required**. Your Password|

##### example response

```json
{
    "message": "Login success",
    "status": "success",
    "access_token": "1|ROyqt4Y9lTvm1T4QulKNGWM9KFhFosbEv8uNNfYK"
}
```

```text
user example:
admin@admin.com
Clave123+
```

#### Get Salary Calculated

```http
  GET /api/v1/salary
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `base_salary`      | `double` | **Required**. |
| `worked_days`      | `integer` | **Required**. |
| `sales_value`      | `integer` | **Required**. |

##### example response

```json
{
    "base_salary": 920.8,
    "worked_days": 25,
    "sales_value": 900,
    "calculated_salary": "774.83",
    "commissions_earned": "7.50",
    "proration_percentage": "16.67"
}
```


## Deployment

To deploy this project run

```bash
  composer install
  php artisan migrate --seed
```

