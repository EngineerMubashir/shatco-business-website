# SHATCO - Premium Company Website

A luxury company website built with Next.js, Tailwind CSS, and Framer Motion. This project features a dark gold and black color theme, smooth animations, modern typography, and a responsive layout.

## Features

- **Modern Tech Stack**: Next.js, TypeScript, Tailwind CSS, Framer Motion
- **Responsive Design**: Fully responsive across all device sizes
- **Animated UI**: Smooth animations and transitions using Framer Motion
- **Luxury Theme**: Dark gold and black color scheme with premium aesthetics
- **Key Sections**: Hero, About, Services, Projects, and Contact

## Getting Started

### Prerequisites

- Node.js (v14 or later)
- npm or yarn

### Installation

1. Clone the repository

```bash
git clone <repository-url>
cd shatco-website
```

2. Install dependencies

```bash
npm install
# or
yarn install
```

3. Run the development server

```bash
npm run dev
# or
yarn dev
```

4. Open [http://localhost:3000](http://localhost:3000) in your browser to see the result.

## Project Structure

```
src/
├── app/              # Next.js App Router files
├── components/       # React components
│   ├── sections/     # Page sections (Hero, About, etc.)
├── styles/           # Global styles and Tailwind config
├── lib/              # Utility functions and helpers
├── assets/           # Static assets like images
```

## Customization

### Tailwind Configuration

The Tailwind configuration is extended with custom colors and fonts in `tailwind.config.js`.

### Adding New Sections

To add a new section:

1. Create a new component in `src/components/sections/`
2. Import and add it to the main page in `src/app/page.tsx`

## Deployment

This project can be easily deployed on Vercel or any other hosting platform that supports Next.js.

```bash
npm run build
# or
yarn build
```

## License

This project is licensed under the MIT License.