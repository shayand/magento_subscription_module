# Mage2 Module Shayand Subscription

    ``shayand/module-subscription``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Shayand Subscription for roast market

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Shayand`
 - Enable the module by running `php bin/magento module:enable Shayand_Subscription`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require shayand/module-subscription`
 - enable the module by running `php bin/magento module:enable Shayand_Subscription`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - API Endpoint
	- POST - Shayand\Subscription\Api\CancelManagementInterface > Shayand\Subscription\Model\CancelManagement

 - Controller
	- frontend > shayand_subscription/index/index

 - Cronjob
	- shayand_subscription_renew

 - Observer
	- checkout_submit_all_after > Shayand\Subscription\Observer\Checkout\SubmitAllAfter


## Attributes

 - Product - subscription_status (subscription_status)

