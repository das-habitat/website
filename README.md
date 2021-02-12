# Website for Das Habitat Augsburg e.V.

## Requirements

- PHP (Kirby runs on PHP 7.1+)
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org/) & [Yarn 1](https://classic.yarnpkg.com/)

### Installing dependencies locally

**On macOS**

- Install [brew](https://brew.sh/) 
- `brew install php` to get a recent version of PHP
- `brew install composer` to get a recent version of Composer, the package manager for PHP
- `brew install volta` to install a reliable manager for Node.js
- `volta install node@lts` to install the latest LTS release of Node.js

**On Windows**

- Install [Chocolatey](https://chocolatey.org)
- `choco install php`
- `choco install composer`
- Install [volta](https://docs.volta.sh/guide/getting-started#windows-installation) 
  to manage Node.js
- `volta install node@lts` to install the latest LTS release of Node.js

## Project dependendencies

- `npm install`
- `npm run composer install`

## Running locally

Kirby

```sh
npm run kirby
```

Asset generation

```sh
npm run gulp
```

## Development

- Learn more about Kirby at [getkirby.com/docs](https://getkirby.com/docs)
- This project uses SCSS and PostCSS through a Gulp based pipeline
- Source for generated and static assets is the `/src` folder
- Source for the Kirby project is `/kirby`

### Content

Note that website content is *no longer* stored in the repository, but directly on our server. This also includes our binary assets (images, pdfs, etc.) as Kirby manages those as well. No more messing with external providers.

You can download the `kirby/content` folder from our server directly in case you want to run the project locally with the same contents and assets. 
