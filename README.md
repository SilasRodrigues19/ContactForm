[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

<!-- PROJECT LOGO -->
<br />
<samp>
<p align="center">
  <a href="https://github.com/SilasRodrigues19/ContactForm">
    <img src="./public/logo.svg" alt="Logo" width="100" height="80">
  </a>

  <h3 align="center">Contact Form</h3>

  <p align="center">
    Contact form with attachments built with PHPMailer
    <br />
    <a href="https://github.com/SilasRodrigues19/ContactForm/issues">Report Bug</a>
  </p>
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#pre-requisites">Pre requisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

[![Preview][product-screenshot]](#)<hr>

Contact form submission module with attachments option


### Built With

Technologies used in the project.

### Frameworks

- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
- [Tailwind CSS](https://tailwindcss.com)

<!-- GETTING STARTED -->

## Getting Started

### Pre requisites

###### NOTE: This explanation below is for Windows users only.

1. Install your local server, access the link below and download it:

```sh
  https://www.apachefriends.org/pt_br/index.html
```

2. Paste the link below in the `File Explorer` for open the xampp-control.exe and then click to start `Apache` service

```sh
  C:\xampp\xampp-control.exe
```

### Installation

1. Open the htdocs directory located at `C:\xampp\htdocs` and clone the repo inside
   ```git
   git clone https://github.com/SilasRodrigues19/ContactForm.git
   ```
2. Access the folder with the following command: 
    ```git
    cd C:\xampp\htdocs\ContactForm
    ```
3. Open the link below to view the app it in your browser.
   ```git
   http://localhost/ContactForm
   ```

4. Access [`/src/Credentials.php/`](https://github.com/SilasRodrigues19/ContactForm/blob/main/src/Credentials.php) and change `email` and `password`:

```php

  define('HOST', 'smtp.gmail.com');
  define('EMAIL', 'example@domain.com'); // Your e-mail address
  define('PASSWORD', 'xxxxxxxxxxxxxx'); // Your secret which can be generated in the following URL -> https://myaccount.google.com/apppasswords
  define('PORT', 587);
```

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

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

Silas Rodrigues - [@jinuye1](https://twitter.com/jinuye1) - silasrodrigues.fatec@gmail.com

Project Link: [https://github.com/SilasRodrigues19/ContactForm](https://github.com/SilasRodrigues19/ContactForm) <br>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/SilasRodrigues19/ContactForm.svg?style=for-the-badge
[contributors-url]: https://github.com/SilasRodrigues19/ContactForm/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/SilasRodrigues19/ContactForm.svg?style=for-the-badge
[forks-url]: https://github.com/SilasRodrigues19/ContactForm/network/members
[stars-shield]: https://img.shields.io/github/stars/SilasRodrigues19/ContactForm.svg?style=for-the-badge
[stars-url]: https://github.com/SilasRodrigues19/ContactForm/stargazers
[issues-shield]: https://img.shields.io/github/issues/SilasRodrigues19/ContactForm.svg?style=for-the-badge
[issues-url]: https://github.com/SilasRodrigues19/ContactForm/issues
[license-shield]: https://img.shields.io/github/license/SilasRodrigues19/ContactForm.svg?style=for-the-badge
[license-url]: https://github.com/SilasRodrigues19/ContactForm/blob/master/LICENSE
[license-url]: https://github.com/SilasRodrigues19/ContactForm/blob/master/LICENSE.txt
[product-screenshot]: ./public/screenshots/preview.png

<br><hr>
[🔼 Back to top](#Contact-Form)