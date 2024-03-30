/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',

    // Add mary
    './vendor/robsontenorio/mary/src/View/Components/**/*.php',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    // Add Blade UI
    './vendor/blade-ui-kit/blade-ui-kit/src/**/*.php'
  ],
  variants: {
    borderColor: ['responsive', 'hover', 'focus', 'focus-within'],
    backgroundSize: ['responsive', 'hover', 'focus'],
    backgroundPosition: ['responsive', 'hover', 'focus']
  },

  theme: {
    extend: {
      colors: {
        'btn-primary': '#4D6EFF',
        'btn-base': 'transparent'
      },
      maxWidth: {
        a4: '210mm'
      },
      transformOrigin: {
        0: '0%'
      },
      zIndex: {
        '-1': '-1'
      },
      backgroundImage: (theme) => ({
        'button-gradient-bottom':
          'linear-gradient(to bottom, ' +
          theme('colors.btn-base') +
          ' 50%, ' +
          theme('colors.btn-primary') +
          ' 50%)',
        'button-gradient':
          'linear-gradient(to right, ' +
          theme('colors.btn-base') +
          ' 50%, ' +
          theme('colors.btn-primary') +
          ' 50%)'
      }),
      backgroundSize: {
        '200%': '200%'
      }
    },

    fontFamily: {
      sans: ['Rubik', 'system-ui'],
      serif: ['Rubik', 'Georgia'],
      mono: ['ui-monospace', 'SFMono-Regular'],
      body: ['"Rubik"', 'Font Awesome']
      // display: ['""'],
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('flowbite/plugin'),
    require('daisyui')
  ],

  daisyui: {
    themes: ['corporate', 'dark', 'business'],
    base: true,
    styled: true,
    utils: true,
    logs: true,
    prefix: '',
    darkTheme: false
  }
}
