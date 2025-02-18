# Laravel Eloquent Has One Through 🚀

## 📌 Introduction
This repository demonstrates how to use **Has One Through** relationships in Laravel Eloquent. The **Has One Through** relationship is used when you want to retrieve a related model through an intermediate model.

### Example Scenario:
- A `User` has one `PhoneNumber`, but the number is stored through the `Company` model.
- Instead of defining multiple relationships, we can use **Has One Through**.

---

## 🛠️ Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/engineersohag/Has-One-Through.git
cd laravel-has-one-through
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Set Up Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Migrate the Database
```bash
php artisan migrate --seed
```

### 5️⃣ Run the Application
```bash
php artisan serve
```

---

## 📚 Database Schema

### 🔹 Users Table
| id | name  |
|----|-------|
| 1  | John  |
| 2  | Alice |

### 🔹 Companies Table
| id | user_id | company_name  |
|----|---------|--------------|
| 1  | 1       | TechCorp     |
| 2  | 2       | WebSolutions |

### 🔹 PhoneNumbers Table
| id | company_id | number     |
|----|-----------|------------|
| 1  | 1         | 123-456-789 |
| 2  | 2         | 987-654-321 |

---

## 🔗 Eloquent Relationship Setup

### 📌 User Model (`User.php`)
```php
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function phoneNumber()
    {
        return $this->hasOneThrough(PhoneNumber::class, Company::class);
    }
}
```

---

### 📌 Company Model (`Company.php`)
```php
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function phoneNumber()
    {
        return $this->hasOne(PhoneNumber::class);
    }
}
```

---

### 📌 PhoneNumber Model (`PhoneNumber.php`)
```php
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
```

---

## 📌 Retrieving Data

```php
$users = User::with('phoneNumber')->get();

foreach ($users as $user) {
    echo $user->name . " - " . ($user->phoneNumber?->number ?? 'No Phone Number') . "<br>";
}
```

---

## 🎯 Expected Output
```
John - 123-456-789
Alice - 987-654-321
```


---

## 🌟 Contributing
Feel free to fork the repository and submit pull requests. Happy coding! 🚀💡
