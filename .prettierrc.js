module.exports = {
  bracketSpacing: true,
  jsxBracketSameLine: false,
  printWidth: 80,
  semi: true,
  singleQuote: true,
  tabWidth: 2,
  trailingComma: 'es5',
  useTabs: false,
  overrides: [
    {
      files: '**/*.md',
      options: {
        tabWidth: 2,
        useTabs: false,
      },
    },
    {
      files: '**/*.yaml',
      options: {
        tabWidth: 2,
        useTabs: false,
      },
    },
    {
      files: '**/*.json',
      options: {
        tabWidth: 2,
        useTabs: false,
      },
    },
  ],
};
