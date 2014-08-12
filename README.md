magento-set-page-size
=====================

INTRODUCTION
-------------
This module is used to set page size of a particular category. The main advantage of this extension is, you can set page size of any category within seconds, without touching any core files. The only thing that you need to do is specify `category id` in observer`(location : app / code / community / Programmerrkt / PageSizeSetter / Model / Observer.php)`. It will do th e magic for you.

WHAT IT DOES
-------------

In magento, if you need to set a page size for a particular category, you may need to do lot of steps. This extension makes this job more simple. It is simple. It uses an event observer in order to make it work.

SUPPORTS
---------

I tested this extesnion in magento version 1.8. But most probably it will work with other version also

INSTALLATION
------------

Download this zip file. Unzip it. Paste it to your Magento application directory. You are done

THEORY
----------

Are you interested to know what happends inside this extension? Checkout my blog `http://rajeev-k-tomy.blogspot.in/2014/07/set-page-size-for-particular-category.html`.

ADDITIONAL INFORMATION
-----------------------

In order to make this extension useful to you, you just want to specify category id in the observer.

File: `app / code / community / Programmerrkt / PageSizeSetter / Model / Observer.php`


  `/**
  *
  * Holds special category Id
  *
  * @var int
  *
  */
  protected $_categoryId = 23 ;
  /**
  *
  * Holds page Size
  *
  * @var int
  *
  */
  protected $_pageSize = 24 ;`



set these two properties as per your need. You are done. Rest will do this extension.
