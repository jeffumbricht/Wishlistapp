# Wishlist App!

## Initial Setup

1. Install Dependencies, including homestead
`$ composer install`

2. Initialize homestead
`$ vendor/bin/homestead make`

3. Copy the example env file
`$ cp .env.example .env`

4. Start vagrant
`$ vagrant up`

## Application Setup

1. ssh into the vm
`$ vagrant ssh`

2. Generate the application key
`vm$ cd code`
`vm$ php artisan key:generate`

3. Run the migrations
`vm$ php artisan migrate`

4. Install devop and front end dependencies
`vm$ npm install`

5. Start gulp
`vm$ gulp`

**Note** Now using bootstrap 4, may need to set `artisan preset none` since bootstrap preset is 3.3.7 ish
