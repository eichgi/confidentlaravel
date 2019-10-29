# Confident Laravel
This is the codebase for the [Confident Laravel](https://confidentlaravel.com) application. It includes all of the features, from the landing page to the video dashboard to the console commands. It is provided for demonstration purposes to follow along with the video course. Although you are welcome to repurpose any of the code, I ask that you not copy this application in its entirety for your own purposes.

**Note:** this codebase comes with **no tests**. It may include bugs, incomplete features, and missing packages. These will be addressed during the video course. At the end of the video course, I offer another download of the completed testing suite.

## Installation
To install this application run:

```
composer install
```

In addition, you should create your own `.env` file and generate an application key by running:
 
```
cp .env.example .env
php artisan key:generate
```

This is all that is required to run the core test suite. Any additional installation will be noted in the video.

### Running Confident Laravel
If you wish to run the the Laravel Dusk test suite or simply run the application in the browser, you will need to perform some additional steps.

1. Add the application to your local web server or run `php artisan serve` in the background.
2. Sign up for [Stripe](https://dashboard.stripe.com/register) in order to test the Stripe API.

Once you have setup your local web server and your Stripe account, you can configure these values in your local `.env` file:

```
APP_URL=http://your-local-url.dev
STRIPE_KEY=pk_test_12345678
STRIPE_SECRET=sk_test_12345678
```

**Note:** although it's not require for the test, to properly display the site, you will need to run Laravel mix. To do so run:

```
npm install
npm run dev
```

## Recommendation
After you download the application I recommend turning it into a local Git repository by running:

```
git init
git add .
git commit -m 'Initial import'
```

After watching each video, commit any changes. This will allow you to easily track and compare you progress. As well as compare the tests you wrote, with the final version at the end.

## Support
Of course if you run into any issues don’t hesitate to email me at jmac@confidentlaravel.com.


