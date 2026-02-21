import '@/styles/globals.css'
import type { Metadata } from 'next'

export const metadata: Metadata = {
  title: 'SHATCO - Premium Engineering Solutions',
  description: 'Premium engineering and technical solutions for your business',
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en">
      <body className="font-sans bg-black-dark text-white min-h-screen">
        <div className="bg-gradient-to-b from-black-dark via-black-dark/80 to-black-dark/90">
          {children}
        </div>
      </body>
    </html>
  )
}
