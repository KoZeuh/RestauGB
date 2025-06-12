<h1 align="center"> Restau'GB </h1> <br>
<p align="center">
  <a href="https://gitpoint.co/">
    <img src="logo.png" width="450">
  </a>
</p>

<p align="center">
    This project is the creation of a website with a management panel for a restaurant (TP for BTS SIO 1st year). Built with PHP 8.1.
</p>

<p align="center">
  <a href="#">
    <img alt="Download on the App Store" title="App Store" src="http://i.imgur.com/0n2zqHD.png" width="140">
  </a>

  <a href="#">
    <img alt="Get it on Google Play" title="Google Play" src="http://i.imgur.com/mtGRPuM.png" width="140">
  </a>
</p>

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
## Table of Contents

- [Introduction](#introduction)
- [Previews](#previews)
- [Features](#features)
- [Feedback](#feedback)
- [Contributors](#contributors)
- [Build Process](#build-process)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Introduction

[![All Contributors](https://img.shields.io/badge/all_contributors-3-orange.svg?style=flat-square)](./CONTRIBUTORS.md)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com)
[![Gitter chat](https://img.shields.io/badge/chat-on_gitter-008080.svg?style=flat-square)](https://gitter.im/RestauGB)

## Previews

<details>
  <summary><strong>➡️ View (Website)</strong></summary>
  <br/>
  <a href="https://restaugb.kozeuh-dev.fr">DEMO</a>
</details>

<details>
  <summary><strong>➡️ View (Management Panel)</strong></summary>
  <br/>
  <a href="https://panel-restaugb.kozeuh-dev.fr">DEMO</a>
</details>

## Features

A few of the things you can do with Restau'GB :

### Website 🌐

* Display of the dish of the day, chosen from the Management Panel, according to day and month.
* Reservation module linked to the Management Panel to display the list of reservations.
* Contact module.

### Management Panel ⚙️

* Log in with username (firstname.lastname) and password (defined by an administrator)
* Create administrator account with 2 choices of permissions. (Access to reservation management and administrator accounts)
* Administrator account deletion.
* Reservation information & modification.
* Reservation cancellation.
* Sort reservations by date.

## Feedback

Feel free to send us feedback -> [file an issue](https://github.com/KoZeuh/RestauGB/issues/new). Feature requests are always welcome. If you wish to contribute, please take a quick look at the [guidelines](./CONTRIBUTING.md)!

## Contributors

[@KoZeuh](https://github.com/KoZeuh) (Management Panel) </br>
[@spaghefoo](https://github.com/spaghefoo) (Website) </br>
[@dylanlmr](https://github.com/dylanlmr) (Website) </br>

## Build Process

- Import SQL file. (`Panel_Gestion/SQL/restau_gb.sql`)
- Insert an Administrator account via the DB by inserting a password in MD5 format (https://md5decrypt.net/ <- To encrypt the desired password) 

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


