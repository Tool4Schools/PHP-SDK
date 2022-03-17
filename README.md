# Tools4Schools SDK for PHP

[![Packagist Version](https://img.shields.io/packagist/v/tools4schools/php-sdk)]()
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/Tool4Schools/PHP-SDK/tests)

## Introduction

The <a href="https://developers.tools4schools.ie/docs/php-sdk" target="_blank">Tools4Schools SDK</a>

## Quick Start

Tools4Schools SDK <a href="https://developers.tools4schools.ie/docs/php-sdk/getting-started" target="_blank">Getting Started Guide</a>

## Pre-requisites

### Register An App

To get started with the SDK, you must have an app
registered on the Tools4schools platform

### Obtain An Access Token

When someone connects with an app using the Tools4Schools Login and approves the request
for permissions, the app obtains an access token that provides temporary, secure
access to the Tools4Schools APIs.

## Installation

The Tools4Schools SDK requires PHP 8.0 or greater.

### Composer

The Tools4Schools SDK uses composer to manage dependencies. Visit the <a href="https://getcomposer.org/download/" target="_blank">composer documentation</a> to learn how to install composer.

To install the SDK in your project you need to require the package via composer:

```bash
composer require tools4schools/php-sdk
```

This SDK and its dependencies will be installed under `./vendor`.

### Alternatives

This repository is written following the [psr-4 autoloading standard](http://www.php-fig.org/psr/psr-4/). Any psr-4 compatible autoloader can be used.

## Usage

### Api main class