# DaiDP STS SDK
User management and Brand tenant

## Download & Install
```bash
composer require phuocdaivl/sts-sdk
```

## Add service provider
Add the service provider to the providers array in the <span style='color:red'>`config/app.php`</span> config file as follows:

```bash
'providers' => [

    ...

    DaiDP\StsSDK\Providers\StsServiceProvider::class,
]
```

Well done.

## User management
Basic use:
```bash
$umSDK = app()->get(\DaiDP\StsSDK\UserManagement\UserManagementInterface::class);
```

### Methods
The following methods are available on the UserManagement instance.

#### register()
Create new account
```bash
$data = [
    'username' => '0766808284',
    'fullname' => 'Phước Đại',
    'email'    => '0766808284@gmail.com',
    'password' => '12345678',
    'confirmpassword' => '12345678'
];
$result = $umSDK->register($data);
```

#### resetPassword()
Set new password for account

```bash
$phone    = '0766808284';
$password = 'abc123ABC';
$result   = $umSDK->resetPassword($phone, $password);
```

## Tenant management
Basic use:
```bash
$tmSDK = app()->get(\DaiDP\StsSDK\TenantManagement\TenantManagementInterface::class);
```

### Methods
The following methods are available on the TenantManagement instance.

#### createTenant()
Create new database tenant
```bash
$name = 'tenant001';
$result = $tmSDK->createTenant($name);
```

#### createConnectionString()
Create new database connection of tenant
```bash
$idTenant = 'f06e16bc-1035-4de3-93cc-96bdd21da4a5';
$connectionString = 'Server=localhost;port=3306;Database=tenant_01;user=root;password=';
$result = $tmSDK->createConnectionString($idTenant, $connectionString);
```

#### getConnectionStrings()
Get database connection string list
```bash
$serviceName = 'RetailProBrand';
$result = $tmSDK->getConnectionStrings($serviceName);
```


## System user management
Basic use:
```bash
$sysuSDK = app()->get(\DaiDP\StsSDK\SystemUserManagement\SystemUserManagementInterface::class);
```

### Methods
The following methods are available on the SystemUserManagement instance.

#### register()
Create new account
```bash
$data = [
    'email'    => 'admin001@gmail.com',
    'fullname' => 'Phước Đại',
    'password' => '12345678',
    'confirmpassword' => '12345678'
];
$result = $sysuSDK->register($data);
```

#### resetPassword()
Set new password for account

```bash
$email    = 'admin001@gmail.com';
$password = 'abc123ABC';
$result   = $sysuSDK->resetPassword($email, $password);
```

#### changePassword()
Change account password

```bash
$email       = 'admin001@gmail.com';
$oldPassword = '12345678';
$newPassword = 'abc123ABC';
$result      = $sysuSDK->changePassword($email, $oldPassword, $newPassword);
```

## Tenant user management
Basic use:
```bash
$tumSDK = app()->get(\DaiDP\StsSDK\TenantUserManagement\TenantUserManagementInterface::class);
$tumSDK->setTenantId('f06e16bc-1035-4de3-93cc-96bdd21da4a5'); // required
```

### Methods
The following methods are available on the TenantUserManagement instance.

#### register()
Create new account
```bash
$data = [
    'username' => 'usertn001',
    'email'    => 'usertn001@gmail.com',
    'fullname' => 'Phước Đại',
    'password' => '12345678',
    'confirmpassword' => '12345678'
];
$result = $tumSDK->register($data);
```

#### resetPassword()
Set new password for account

```bash
$username = 'usertn001';
$password = 'abc123ABC';
$result   = $tumSDK->resetPassword($username, $password);
```

#### changePassword()
Change account password

```bash
$username    = 'usertn001';
$oldPassword = '12345678';
$newPassword = 'abc123ABC';
$result      = $tumSDK->changePassword($username, $oldPassword, $newPassword);
```