export default {
    darkMode: 'class',
  
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
  
    theme: {
      extend: {
        colors: {
          bg: 'var(--bg)',
          card: 'var(--card)',
          text: 'var(--text)',
          muted: 'var(--muted)',
          primary: 'var(--primary)',
          accent: 'var(--accent)',
        },
      },
    },
  
    plugins: [],
  }