const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './*/*.php',
    './**/*.php',
    './js/*.js',
    './functions.php',
    '../../plugins/blockhaus-functionality-base/includes/blocks/**/*.php',
  ],
  safelist: [
    'rounded-blob',
    'object-right',
    'object-left',
    'object-center',
    'aspect-video',
    'aspect-hero',
    'gap-x-12',
    'gap-y-6',
    'p-0',
    'ring-offset-primary',
    'grid-cols-fit',
    'grid-cols-fill',
    'sticky',
  ],
  theme: {
    screens: {
      sm: '640px',
      // => @media (min-width: 640px) { ... }

      md: '768px',
      // => @media (min-width: 768px) { ... }

      lg: '1024px',
      // => @media (min-width: 1024px) { ... }

      xl: '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1700px',
      // => @media (min-width: 1536px) { ... }
    },
    fontFamily: {
      sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
      serif: ['Merriweather', ...defaultTheme.fontFamily.serif],
      mono: [...defaultTheme.fontFamily.mono],
    },
    fontSize: {
      sm: 'var(--wp--preset--font-size--small)',
      tiny: 'var(--wp--preset--font-size--tiny)',
      default: 'var(--wp--preset--font-size--normal)',
      lg: 'var(--wp--preset--font-size--large)',
      xl: 'var(--wp--preset--font-size--extra-large)',
      huge: 'var(--wp--preset--font-size--huge)',
      gigantic: 'var(--wp--preset--font-size--gigantic)',
      display: 'var(--wp--preset--font-size--display)',
    },
    extend: {
      colors: {
        base: 'var(--wp--preset--color--base)',
        contrast: 'var(--wp--preset--color--contrast)',
        primary: 'var(--wp--preset--color--primary)',
        secondary: 'var(--wp--preset--color--secondary)',
        neutral: {
          light: {
            100: 'var(--wp--preset--color--neutral-light-100)',
            500: 'var(--wp--preset--color--neutral-light-500)',
            900: 'var(--wp--preset--color--neutral-light-900)',
          },
          dark: {
            100: 'var(--wp--preset--color--neutral-dark-100)',
            500: 'var(--wp--preset--color--neutral-dark-500)',
            900: 'var(--wp--preset--color--neutral-dark-900)',
          },
        },
      },
      backgroundImage: {
        gradient: 'var(--wp--preset--gradient--gray-to-cyan)',
        'grain-dots':
          "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%230f0f0f' fill-opacity='.5' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E\")",
        curves:
          "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' id='visual' viewBox='0 0 900 600' width='900' height='600'%3E%3Cpath d='M584 600L596 550C608 500 632 400 588.5 300C545 200 434 100 378.5 50L323 0L900 0L900 50C900 100 900 200 900 300C900 400 900 500 900 550L900 600Z' fill='%23bfbfbf40'%3E%3C/path%3E%3Cpath d='M251 600L303.5 550C356 500 461 400 455 300C449 200 332 100 273.5 50L215 0L324 0L379.5 50C435 100 546 200 589.5 300C633 400 609 500 597 550L585 600Z' fill='%23ffffff50'%3E%3C/path%3E%3Cpath d='M0 600L0 550C0 500 0 400 0 300C0 200 0 100 0 50L0 0L216 0L274.5 50C333 100 450 200 456 300C462 400 357 500 304.5 550L252 600Z' fill='%23cccbcb3b'%3E%3C/path%3E%3C/svg%3E\")",
        waves:
          "url('/wp-content/themes/blockhaus/assets/images/backgrounds/waves.svg')",
        'waves-alt':
          "url('/wp-content/themes/blockhaus/assets/images/backgrounds/waves-45.svg')",
      },
      aspectRatio: {
        hero: '16 / 11',
      },
      borderRadius: {
        blob: '61% 39% 36% 64% / 47% 50% 50% 53%',
      },
      boxShadow: {
        retro: '2px 2px 0 0 currentColor',
      },
      gridTemplateColumns: {
        // Complex site-specific column configuration
        fit: 'repeat(auto-fit, minmax(300px, 1fr))',
        fill: 'repeat(auto-fill, minmax(300px, 1fr))',
      },
      typography: {
        DEFAULT: {
          css: {
            color: 'var(--wp--preset--color--contrast)',
            a: {
              color: 'var(--wp--preset--color--primary)',
              textDecorationThickness: '2px',
              fontWeight: '900',
              '&:hover': {
                color: 'var(--wp--preset--color--contrast)',
              },
            },
          },
        },
      },
    },
  },
  plugins: [
    // require('@tailwindcss/typography'),
    require('@tailwindcss/forms')({
      strategy: 'base', // only generate global styles
    }),
  ],
};
