---
layout: page
title: About me
description: "True fact: I do drink a lot of Coke"
background: '/img/bg-about.png'
---

## Hello!

In my day job I help to make awesome PHP applications that help to bring the world a little closer together. With my open source hat on, I create and/or maintain some libraries that I've needed that otherwise wouldn't exist 🦾.

Sometimes in my career, I've looked for a library to complete what I imagined to be a fairly common task and to my surprise have found that one either doesn't exist or has been abandoned by it's original author. This makes me sad, sometimes sad enough that I've decided to do something about it 😇.

Those libraries have now recorded over 400,000 downloads on Packagist so I'm fairly confident that there are people out there using them to do all sorts of wonderful things which gives me warm and fuzzy feelings.

## 📦[BoxPacker](https://boxpacker.io) [![Download count](https://img.shields.io/packagist/dt/dvdoug/boxpacker.svg)](https://packagist.org/packages/dvdoug/boxpacker)
An original creation because nothing else in PHP-land existed. When you try and get a pricing quote from a courier, you're asked for the width/length/depth of the box and it's weight. When you're working in e-commerce, weight is easy: you simply add up the individual weights of the all the stuff the customer ordered. But the dimensions of the box(es)? That's....more complex.

## 🌍[PHPCoord](https://github.com/dvdoug/PHPCoord) [![Download count](https://img.shields.io/packagist/dt/php-coord/php-coord.svg)](https://packagist.org/packages/php-coord/php-coord)
If you have a latitude/longitude from GPS and just want to plot it on Google Maps or OpenStreetMap you probably don't need this. But if you have grid co-ordinates from a national mapping system e.g. the UK's Ordnance Survey and need to convert them, or have recently had your mind blown by discovering that the GPS latitude/longitude of a spot does not always agree with what national mapping authorities think it is then you need a conversion library. This project already existed when I first needed to do co-ordinate conversion, but was written for PHP4. I've since polished it up, fixed some bugs and added some features.

## 📈[behat-code-coverage](https://github.com/dvdoug/behat-code-coverage) [![Download count](https://img.shields.io/packagist/dt/dvdoug/behat-code-coverage.svg)](https://packagist.org/packages/dvdoug/behat-code-coverage)
My most recent pick-up, this is actually a fork of an abandoned fork of an abandoned project making me something of a 3rd-generation maintainer. The library allows you to generate code coverage reports when running a Behat test suite, just like those you can get when running PHPUnit.

## 📈[php-code-coverage](https://github.com/sebastianbergmann/php-code-coverage)
I've also done some work on enhancing the code coverage statistics reported by PHPUnit's code coverage component as
this is what's wrapped by behat-code-coverage. You can read about those changes [here](https://doug.codes/php-code-coverage).
