---
layout: page
title: About me
description: "True fact: I do drink a lot of Coke"
background: '/img/bg-about.png'
permalink: '/about'
---

## Hello!

In my day job I help to make awesome applications that help to empower people and bring the world a little closer together.
With my open source hat on, I create and/or maintain some libraries that I've needed that otherwise wouldn't exist 🦾

Sometimes in my career, I've looked for a library to complete what I imagined to be a fairly common task and to my
surprise have found that one either doesn't exist or has been abandoned by its original author. This makes me sad,
sometimes sad enough that I've decided to do something about it 😇.

Those libraries have now recorded over 6,000,000 downloads so I'm fairly confident that there are people out
there using them to do all sorts of wonderful things.

## 📦[BoxPacker](https://boxpacker.io) [![Download count](https://img.shields.io/packagist/dt/dvdoug/boxpacker.svg)](https://packagist.org/packages/dvdoug/boxpacker)
An original creation because nothing else that I could find was suitable. When you try and get a pricing quote from a courier,
you're asked for the width/length/depth of the box and it's weight. When you're working in e-commerce, weight is easy:
you simply add up the individual weights of the all the stuff the customer ordered.

But the dimensions of the box(es)? That's....more complex.

## 🌍[PHPCoord](https://phpcoord.net) [![Download count](https://img.shields.io/packagist/dt/php-coord/php-coord.svg)](https://packagist.org/packages/php-coord/php-coord)
If you have a latitude/longitude from GPS and just want to plot it on Google Maps or OpenStreetMap you probably don't need this.
But if you have grid co-ordinates from a national mapping system e.g. the UK's Ordnance Survey and need to convert them,
or have recently had your mind blown by discovering that the GPS latitude/longitude of a spot does not always agree with
what national mapping authorities think it is then you need a conversion library. This project already existed when I
first needed to do co-ordinate conversion, but was written for an old version of PHP. I polished it up, fixed some bugs
and added some features.

Since then, the project has been completely rewritten and now supports over 7,000 different coordinate systems, up from
just 10 in previous versions.

## 📈[Behat Code Coverage](https://behat.cc) [![Download count](https://img.shields.io/packagist/dt/dvdoug/behat-code-coverage.svg)](https://packagist.org/packages/dvdoug/behat-code-coverage)
My most recent pick-up, this is actually a fork of an abandoned fork of a long-abandoned project making me something of a
3rd-generation maintainer. This Behat extension allows you to generate code coverage reports when running a Behat test suite,
just like those you can get when running PHPUnit.

## 📈[php-code-coverage](https://github.com/sebastianbergmann/php-code-coverage)
In 2020 I did substantial work enhancing the code coverage statistics reported by PHPUnit's code coverage component, to
(optionally) produce branch and path coverage alongside the traditional line-based metrics. As part of that work, I also
contributed performance enhancements that make coverage generation quicker even when not using the new metrics.

An in-depth writeup of the changes is available to read [here](https://doug.codes/php-code-coverage).
