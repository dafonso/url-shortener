<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/dafonso/url-shortner">
    <img src="public/img/undraw_loading_frh4.svg" alt="Logo" width="128" height="128">
  </a>

  <h3 align="center">URL Shortener</h3>
  <p align="center">
  <!-- PROJECT SHIELDS -->
  [![Contributors][contributors-shield]][contributors-url]
  [![Forks][forks-shield]][forks-url]
  [![Stargazers][stars-shield]][stars-url]
  [![Issues][issues-shield]][issues-url]
  [![MIT License][license-shield]][license-url]</p>

  <p align="center">
    An URL shortener app done as a code challenge. 
    <br />
    <br />
    ·
    <a href="//github.com/dafonso/url-shortener/issues">Report Bug</a>
    ·
    <a href="//github.com/dafonso/url-shortener/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

### Built With

* [Laravel](https://laravel.com/)
* [Vue.js](https://vuejs.org/)
* [Bulma](https://bulma.io/)



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* PHP 7.2+
* Composer

### Installation
 
1. Clone url-shortener repo
```sh
git clone https://github.com/dafonso/url-shortener.git && cd url-shortener
```
2. Install dependencies
```sh
npm install && composer install
```
3. Copy .env.example file
```sh
cp .env.example .env
```
4. Create SQLite file
```sh
touch database/database.sqlite
```
5. Generate a new encryption key for the app
```sh
php artisan migrate:fresh
```
6. Run Migrations
```sh
php artisan migrate:fresh
```
7. Run Mix and Serve app
```sh
npm run prod && php artisan serve
```
8. Access URL Shortener app on http://localhost:8000

<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/dafonso/url-shortener/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.


<!-- CONTACT -->
## Contact

Diogo Afonso - [@twitter_handle](https://twitter.com/dafonso) 

Project Link: [https://github.com/dafonso/url-shortener](https://github.com/dafonso/url-shortener)

<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

* [highlight.js](https://highlightjs.org/)
* [Moment.js ](https://momentjs.com/)


<!-- MARKDOWN LINKS & IMAGES -->
[contributors-shield]: https://img.shields.io/github/contributors/dafonso/url-shortener.svg
[contributors-url]: https://github.com/dafonso/url-shortener/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/dafonso/url-shortener.svg?style=flat-square
[forks-url]: https://github.com/dafonso/url-shortener/network/members
[stars-shield]: https://img.shields.io/github/stars/dafonso/url-shortener.svg?style=flat-square
[stars-url]: https://github.com/dafonso/url-shortener/stargazers
[issues-shield]: https://img.shields.io/github/issues/dafonso/url-shortener.svg?style=flat-square
[issues-url]: https://github.com/dafonso/url-shortener/issues
[license-shield]: https://img.shields.io/github/license/dafonso/url-shortener.svg?style=flat-square
[license-url]: https://github.com/dafonso/url-shortener/blob/master/LICENSE.txt
[product-screenshot]: public/images/screenshot.png
[build-shield]: https://img.shields.io/github/workflow/status/dafonso/url-shortener/Laravel
[build-url]: https://github.com/dafonso/url-shortener/actions?query=workflow%3ALaravel
