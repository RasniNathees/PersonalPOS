/* eslint-env node */
require('@rushstack/eslint-patch/modern-module-resolution')

// module.exports = {
//   root: true,
//   'extends': [
//     'plugin:vue/vue3-essential',
//     'eslint:recommended',
//     '@vue/eslint-config-typescript',
//     '@vue/eslint-config-prettier/skip-formatting'
//   ],
//   overrides: [
//     {
//       files: [
//         'cypress/e2e/**/*.{cy,spec}.{js,ts,jsx,tsx}',
//         'cypress/support/**/*.{js,ts,jsx,tsx}'
//       ],
//       'extends': [
//         'plugin:cypress/recommended'
//       ]
//     }
//   ],
//   parserOptions: {
//     ecmaVersion: 'latest'
//   }
// }
module.exports = {
  root: true,
  env: {
    browser: true,
    es2021: true,
  },
  extends: [
    'eslint:recommended',
    'plugin:vue/recommended',
    'airbnb-base',
    'plugin:prettier/recommended',
  ],
  parserOptions: {
    ecmaVersion: 2021, // ES2021 includes all features of ES6 and beyond
    sourceType: 'module',
  },
  plugins: ['vue'],
  rules: {
    'prettier/prettier': [
      'error',
      {
        singleQuote: true,
        semi: false,
        trailingComma: 'es5',
        arrowParens: 'avoid',
      },
    ],
    'import/extensions': [
      'error',
      'ignorePackages',
      {
        js: 'never',
        vue: 'never',
      },
    ],
    'import/no-extraneous-dependencies': [
      'error',
      {
        devDependencies: [
          '**/tests/**/*.js',
          '**/*.config.js',
          '**/*.spec.js',
        ],
      },
    ],
    'no-console': import.meta.env.App_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': import.meta.env.App_ENV === 'production' ? 'warn' : 'off',
    'vue/no-v-html': 'off',
  },
  settings: {
    'import/resolver': {
      node: {
        extensions: ['.js', '.jsx', '.ts', '.tsx', '.vue'],
      },
    },
  },
}
