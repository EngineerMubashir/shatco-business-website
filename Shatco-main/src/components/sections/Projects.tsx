'use client'

import { useRef, useState } from 'react'
import { motion, useInView, AnimatePresence } from 'framer-motion'
import Image from 'next/image'
import Link from 'next/link'

// ✅ Local images (place them in /public/images/projects/)
export const projects = [
  {
    id: 1,
    title: 'MEP project with main contractor at NHC villa project',
    category: 'MEP Services',
    location: 'near Riyadh airport (Murcia)',
    description:
      'Comprehensive MEP services for luxury villas, including HVAC, electrical, and plumbing systems integration.',
    image: '/images/projects/mep.webp',
    year: '2022',
  },
  {
    id: 2,
    title: 'Low current project for SEC',
    category: 'Low Current Solutions',
    location: 'Saudi Electric Company, Abha',
    description:
      'Implementation of advanced low current systems for improved security and communication infrastructure.',
    image: '/images/projects/low-current.webp',
    year: '2021',
  },
  {
    id: 3,
    title: 'RMU swap project for SEC',
    category: 'Power Solutions',
    location: 'Saudi Electric Company, Riyadh',
    description:
      'Ring Main Unit replacement and upgrade for enhanced power distribution reliability.',
    image: '/images/projects/power.webp',
    year: '2023',
  },
  {
    id: 4,
    title: 'Solar Power Installation',
    category: 'Solar Solutions',
    location: 'Residential Complex, Jeddah',
    description:
      'Installation of solar power systems for a residential complex, reducing energy costs and carbon footprint.',
    image: '/images/projects/solar.webp',
    year: '2022',
  },
  {
    id: 5,
    title: 'ICT Infrastructure Upgrade',
    category: 'ICT Solutions',
    location: 'Corporate Office, Dammam',
    description:
      'Complete overhaul of ICT infrastructure for improved connectivity, security, and performance.',
    image: '/images/projects/ict.webp',
    year: '2021',
  },
  {
    id: 6,
    title: 'IoT Smart Building Implementation',
    category: 'IoT Solutions',
    location: 'Commercial Center, Riyadh',
    description:
      'Integration of IoT solutions for building management, energy efficiency, and enhanced security systems.',
    image: '/images/projects/iot.webp',
    year: '2023',
  },
]

export const categories = [
  'All',
  'Power Solutions',
  'Low Current Solutions',
  'ICT Solutions',
  'IoT Solutions',
  'MEP Services',
  'Solar Solutions',
]

const Projects = () => {
  const [activeCategory, setActiveCategory] = useState('All')
  const ref = useRef(null)
  const isInView = useInView(ref, { once: true, margin: '-100px 0px' })

  const filteredProjects =
    activeCategory === 'All'
      ? projects
      : projects.filter((p) => p.category === activeCategory)

  const containerVariants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: { staggerChildren: 0.15 },
    },
  }

  const itemVariants = {
    hidden: { opacity: 0, y: 30 },
    visible: { opacity: 1, y: 0, transition: { duration: 0.5 } },
  }

  return (
    <section id="projects" className="py-24 relative overflow-hidden">
      {/* Background blur */}
      <div className="absolute top-1/3 right-1/4 w-64 h-64 bg-orange/5 blur-[100px] rounded-full" />

      <div className="container-custom">
        {/* Header Section */}
        <motion.div
          ref={ref}
          variants={containerVariants}
          initial="hidden"
          animate={isInView ? 'visible' : 'hidden'}
          className="text-center mb-16"
        >
          <motion.span
            variants={itemVariants}
            className="text-orange uppercase tracking-widest font-medium"
          >
            Our Work
          </motion.span>

          <motion.h2
            variants={itemVariants}
            className="heading-lg mt-4 mb-6"
          >
            Featured <span className="orange-gradient">Projects</span>
          </motion.h2>

          <motion.p
            variants={itemVariants}
            className="text-gray-300 max-w-3xl mx-auto mb-10"
          >
            Explore some of our recent projects that highlight our expertise in
            power, renewable energy, MEP, low current, and ICT solutions.
          </motion.p>

          <motion.div
            variants={itemVariants}
            className="flex flex-wrap justify-center gap-3 mb-10"
          >
            {categories.map((category) => (
              <button
                key={category}
                onClick={() => setActiveCategory(category)}
                className={`px-4 py-2 rounded-sm transition-colors duration-300 ${
                  activeCategory === category
                    ? 'bg-orange text-gray-dark'
                    : 'bg-gray-dark text-white hover:bg-orange/20'
                }`}
              >
                {category}
              </button>
            ))}
          </motion.div>
        </motion.div>

        {/* Projects Grid */}
        <AnimatePresence mode="wait">
          <motion.div
            key={activeCategory}
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -20 }}
            transition={{ duration: 0.6, ease: 'easeOut' }}
            className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
          >
            {filteredProjects.map((project, index) => (
              <motion.div
                key={project.id}
                variants={itemVariants}
                initial="hidden"
                animate="visible"
                transition={{ delay: index * 0.1 }}
                whileHover={{
                  y: -10,
                  transition: { duration: 0.3 },
                }}
                className="group relative overflow-hidden rounded-tr-2xl rounded-bl-2xl cursor-pointer bg-gray-dark"
              >
                {/* ✅ Optimized Image */}
                <div className="relative aspect-[4/3] overflow-hidden">
                  <Image
                    src={project.image}
                    alt={project.title}
                    fill
                    className="object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                    sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw"
                    priority={index < 2}
                  />
                  <div className="absolute top-4 right-4 bg-orange/90 text-gray-dark text-xs font-medium py-1 px-3 rounded-sm">
                    {project.category}
                  </div>
                </div>

                {/* Hover Overlay */}
                <div className="absolute inset-0 bg-gradient-to-t from-gray-dark via-gray-dark/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                  <div>
                    <h3 className="text-xl font-serif font-bold text-white mb-1">
                      {project.title}
                    </h3>
                    <div className="text-orange text-sm mb-2">
                      {project.location}
                    </div>
                    <p className="text-sm text-gray-300 mb-3">
                      {project.description}
                    </p>
                    <Link
                      href={`/projects/${project.id}`}
                      className="text-orange text-sm flex items-center"
                    >
                      View Project
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-4 w-4 ml-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth={2}
                          d="M14 5l7 7m0 0l-7 7m7-7H3"
                        />
                      </svg>
                    </Link>
                  </div>
                </div>
              </motion.div>
            ))}
          </motion.div>
        </AnimatePresence>
      </div>
    </section>
  )
}

export default Projects