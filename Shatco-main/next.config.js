/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  swcMinify: true,
  output: 'export', // ✅ required for static export
  images: {
    unoptimized: true, // ✅ required to avoid Next image errors on static hosting
  },
};

module.exports = nextConfig;
