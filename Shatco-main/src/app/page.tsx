'use client'

import { useEffect } from 'react'
import { motion } from 'framer-motion'
import Header from '@/components/Header'
import Hero from '@/components/sections/Hero'
import About from '@/components/sections/About'
import ProductsAndServices from '@/components/sections/ProductsAndServices'
import Projects from '@/components/sections/Projects'
import Contact from '@/components/sections/Contact'
import Footer from '@/components/Footer'

export default function Home() {
  return (
    <main className="min-h-screen">
      <Header />
      <Hero />
      <About />
      
      {/* Services and Projects Sections */}
      <div className="relative">
        <div className="relative bg-black-dark">
          <ProductsAndServices />
        </div>
        
        <div className="relative bg-black">
          <Projects />
        </div>
      </div>
      
      <Contact />
      <Footer />
    </main>
  )
}