/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',

    // Add mary
    './vendor/robsontenorio/mary/src/View/Components/**/*.php'
  ],
  variants: {
    borderColor: ['responsive', 'hover', 'focus', 'focus-within']
  },

  theme: {
    extend: {
      maxWidth: {
        a4: '210mm'
      },
      transformOrigin: {
        0: '0%'
      },
      zIndex: {
        '-1': '-1'
      }
    },

    fontFamily: {
      sans: ['Monsterrat', 'system-ui'],
      serif: ['ui-serif', 'Georgia'],
      mono: ['ui-monospace', 'SFMono-Regular'],
      body: ['"Monsterrat"', 'Font Awesome']
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
    themes: ['dim', 'dark', 'business'],
    base: true,
    styled: true,
    utils: true,
    logs: true,
    prefix: '',
    darkTheme: false
  }
}
