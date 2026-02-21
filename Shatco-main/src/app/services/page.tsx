'use client'

import { motion } from 'framer-motion'
import Link from 'next/link'
import Image from 'next/image'
import { serviceCategories } from '../../components/sections/ProductsAndServices'


export default function ServicesPage() {
  const containerVariants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.1
      }
    }
  }

  const itemVariants = {
    hidden: { y: 20, opacity: 0 },
    visible: {
      y: 0,
      opacity: 1,
      transition: {
        type: 'spring',
        stiffness: 100
      }
    }
  }

  return (
    <div className="min-h-screen pt-24 pb-20 px-4 sm:px-6 lg:px-8" style={{ background: "linear-gradient(to bottom, #000000, #0a0a0a, #1a1200)" }}>
      <motion.div 
        className="max-w-7xl mx-auto"
        initial="hidden"
        animate="visible"
        variants={containerVariants}
      >
        <motion.h1 
          className="text-4xl md:text-5xl font-bold mb-6 text-orange text-center"
          variants={itemVariants}
        >
          Our Services
        </motion.h1>
        
        <motion.p 
          className="text-xl mb-16 text-gray-light max-w-3xl mx-auto text-center"
          variants={itemVariants}
        >
          Explore our comprehensive range of premium services designed to meet your specific needs with excellence and innovation.
        </motion.p>
        
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {serviceCategories.map((service, index) => (
            <motion.div
              key={service.id}
              variants={itemVariants}
              className="bg-black rounded-lg overflow-hidden border border-orange/20 hover:border-orange/40 transition-all duration-300 shadow-lg hover:shadow-orange/20"
              whileHover={{ y: -5, transition: { duration: 0.2 } }}
            >
              <div className="relative h-56">
                <Image
                  src={service.content.image}
                  alt={service.content.imageAlt}
                  fill
                  className="object-cover"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end">
                  <h3 className="text-2xl font-bold p-4 text-orange">{service.name}</h3>
                </div>
              </div>
              
              <div className="p-6">
                <p className="text-gray-300 mb-6 line-clamp-3">{service.content.description}</p>
                <Link 
                  href={`/services/${service.id}`}
                  className="btn-primary inline-block text-black bg-orange hover:bg-orange-dark"
                >
                  Learn More
                </Link>
              </div>
            </motion.div>
          ))}
        </div>
      </motion.div>
    </div>
  )
}