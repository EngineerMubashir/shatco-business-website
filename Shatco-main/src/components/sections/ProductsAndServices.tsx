'use client'

import { useRef, useState } from 'react'
import { motion, useInView, AnimatePresence } from 'framer-motion'
import Image from 'next/image'
import Link from 'next/link'
import Head from 'next/head'

export const serviceCategories = [
  {
    name: 'Power Solutions & Services',
    id: 'power-solutions',
    content: {
      title: 'Power System Solutions',
      description:
        'We specialize in delivering innovative power solutions tailored to residential and commercial needs. From electrical infrastructure to smart grid systems, we ensure efficiency, reliability, and safety.',
      services: [
        { title: 'Residential Power Systems', description: 'Tailored electrical solutions for homes.' },
        { title: 'Commercial Power Systems', description: 'Robust systems for commercial buildings and facilities.' },
        { title: 'Energy Efficiency', description: 'Solutions to optimize energy consumption and costs.' },
        { title: 'Power Management', description: 'Monitoring and management systems for stable supply.' },
      ],
      image: '/solar.webp',
      imageAlt: 'Power distribution systems',
    },
  },
  {
    name: 'Low Current Solutions & Services',
    id: 'low-current',
    content: {
      title: 'Low Current Systems',
      description:
        'Comprehensive low current integrations including CCTV, access control, and building automation to improve safety and connectivity.',
      services: [
        { title: 'Security Systems', description: 'CCTV, access control and detection systems.' },
        { title: 'Communication Networks', description: 'Structured cabling and communications infrastructure.' },
        { title: 'Building Management', description: 'BMS for centralized monitoring and control.' },
      ],
      image: '/solar.webp',
      imageAlt: 'Low current system installation',
    },
  },
  {
    name: 'ICT Solutions & Services',
    id: 'ict-solutions',
    content: {
      title: 'Information & Communication Technology',
      description:
        'Design and implementation of resilient ICT infrastructures — networks, data centers, and cloud services to keep businesses connected and secure.',
      services: [
        { title: 'Network Infrastructure', description: 'High-performance LAN/WAN network design & deployment.' },
        { title: 'Data Center Solutions', description: 'Data center design, build and redundancy planning.' },
        { title: 'Cloud Services', description: 'Secure, scalable cloud migration and management.' },
      ],
      image: '/solar.webp',
      imageAlt: 'ICT infrastructure',
    },
  },
  {
    name: 'IoT Solutions & Services',
    id: 'iot-solutions',
    content: {
      title: 'IoT Integration & Solutions',
      description:
        'Smart IoT solutions for buildings and industry — sensor networks, automation and analytics to drive efficiency and insights.',
      services: [
        { title: 'Smart Building Solutions', description: 'Occupancy, lighting and HVAC automation.' },
        { title: 'Industrial IoT', description: 'Connected devices and process monitoring for factories.' },
        { title: 'IoT Consulting', description: 'Strategy and implementation roadmaps for IoT projects.' },
      ],
      image: '/solar.webp',
      imageAlt: 'IoT connected devices',
    },
  },
  {
    name: 'MEP Services',
    id: 'mep-services',
    content: {
      title: 'Mechanical, Electrical & Plumbing',
      description:
        'Full MEP design and execution — HVAC, electrical, plumbing and coordination for safe, efficient building systems.',
      services: [
        { title: 'Mechanical Systems', description: 'HVAC design, ducting and mechanical installations.' },
        { title: 'Electrical Engineering', description: 'Power distribution, wiring and load analysis.' },
        { title: 'Plumbing Solutions', description: 'Sanitary, drainage and water systems design.' },
      ],
      image: '/solar.webp',
      imageAlt: 'MEP system installation',
    },
  },
  {
    name: 'Solar Solutions',
    id: 'solar-solutions',
    content: {
      title: 'Solar Power Systems',
      description:
        'End-to-end solar solutions: design, installation and maintenance to maximize energy independence and savings.',
      services: [
        { title: 'Residential Solar', description: 'Rooftop solutions for homes.' },
        { title: 'Commercial Solar', description: 'Large-scale installations for businesses.' },
        { title: 'Solar Maintenance', description: 'Preventive & corrective maintenance for peak performance.' },
      ],
      image: '/solar.webp',
      imageAlt: 'Solar panel installation',
    },
  },
  {
    name: 'Telecom Services',
    id: 'telecom-services',
    content: {
      title: 'Telecommunications Solutions',
      description:
        'Design and deployment of telecom networks — fiber, VoIP, and 5G-ready infrastructure to keep your organization connected.',
      services: [
        { title: 'Network Design & Implementation', description: 'Tailored telecom network architecture.' },
        { title: 'Fiber Optic Solutions', description: 'High-speed fiber deployment and testing.' },
        { title: '5G Infrastructure', description: 'Planning and roll-out support for next-gen wireless.' },
        { title: 'VoIP & UC', description: 'Unified communications and VoIP systems.' },
      ],
      image: '/solar.webp',
      imageAlt: 'Telecom infrastructure',
    },
  },
]

export default function ProductsAndServices() {
  const [activeCategory, setActiveCategory] = useState(serviceCategories[0].id)
  const ref = useRef(null)
  const isInView = useInView(ref, { once: true, margin: '-100px 0px' })
  const activeService = serviceCategories.find((c) => c.id === activeCategory)?.content

  const containerVariants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: { staggerChildren: 0.12, delayChildren: 0.12, duration: 0.6 },
    },
  }

  const itemVariants = {
    hidden: { opacity: 0, y: 18 },
    visible: { opacity: 1, y: 0, transition: { duration: 0.45, ease: 'easeOut' } },
  }

  return (
    <>
      <Head>
        <title>SHATCO - Products & Services</title>
        <meta
          name="description"
          content="Explore SHATCO's power, MEP, ICT, IoT, solar and telecom solutions — engineering excellence and smart systems."
        />
      </Head>

      <section
        id="products-services"
        className="py-24 relative overflow-hidden min-h-screen bg-gradient-to-br from-black via-[#1a0e00] to-[#2b0f00] text-gray-100"
      >
        {/* 🔸 Background Glow similar to Hero & About */}
        <div className="absolute inset-0 z-0">
          <div className="absolute top-1/4 left-1/3 w-96 h-96 bg-orange-500/20 blur-[120px] rounded-full" />
          <div className="absolute bottom-1/4 right-1/3 w-[28rem] h-[28rem] bg-orange-600/10 blur-[120px] rounded-full" />
        </div>

        <div className="container-custom relative z-10">
          <motion.div
            ref={ref}
            variants={containerVariants}
            initial="hidden"
            animate={isInView ? 'visible' : 'hidden'}
            className="text-center mb-16"
          >
            <motion.span variants={itemVariants} className="text-orange uppercase tracking-widest font-medium">
              What We Offer
            </motion.span>

            <motion.h2 variants={itemVariants} className="heading-lg mt-4 mb-6 text-gray-100">
              Products & <span className="orange-gradient">Services</span>
            </motion.h2>

            <motion.p variants={itemVariants} className="text-gray-300 max-w-3xl mx-auto mb-10">
              Explore our specialized solutions across power, MEP, ICT, IoT, solar and telecom — designed for reliability
              and performance.
            </motion.p>

            <motion.div
              variants={itemVariants}
              className="flex flex-wrap justify-center gap-4 mb-12 overflow-x-auto py-2"
            >
              {serviceCategories.map((category) => (
                <button
                  key={category.id}
                  onClick={() => setActiveCategory(category.id)}
                  className={`px-4 py-2 rounded-md transition-colors duration-300 whitespace-nowrap ${
                    activeCategory === category.id
                      ? 'bg-orange text-black shadow-md shadow-orange-900/30'
                      : 'bg-black text-white hover:bg-orange/20 border border-orange/20'
                  }`}
                >
                  {category.name}
                </button>
              ))}
            </motion.div>
          </motion.div>

          <AnimatePresence mode="wait">
            {activeService && (
              <motion.div
                key={activeCategory}
                initial={{ opacity: 0, y: 12 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: -8 }}
                transition={{ duration: 0.45 }}
                className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center"
              >
                {/* Text Column */}
                <motion.div variants={containerVariants} initial="hidden" animate="visible">
                  <motion.h3 variants={itemVariants} className="text-2xl font-serif font-bold text-white mb-4">
                    {activeService.title}
                  </motion.h3>

                  <motion.p variants={itemVariants} className="text-gray-300 mb-8">
                    {activeService.description}
                  </motion.p>

                  <motion.div variants={containerVariants} className="space-y-6">
                    {activeService.services.map((s, idx) => (
                      <motion.div
                        key={idx}
                        variants={itemVariants}
                        className="bg-black border border-orange/20 p-4 rounded-md hover:border-orange/40 transition-colors duration-300"
                      >
                        <h4 className="text-lg font-medium text-orange mb-1">{s.title}</h4>
                        <p className="text-gray-400 text-sm">{s.description}</p>
                      </motion.div>
                    ))}
                  </motion.div>

                  <motion.div variants={itemVariants} className="mt-8 flex space-x-4">
                    <Link href={`/services/${activeCategory}`} className="btn-primary inline-block">
                      Learn More
                    </Link>
                    <a href="#contact" className="btn-outline inline-block">
                      Request Information
                    </a>
                  </motion.div>
                </motion.div>

                {/* Image Column with orange glow container */}
                <motion.div
                  variants={itemVariants}
                  className="relative bg-gradient-to-tr from-orange-900/40 via-orange-800/20 to-transparent rounded-3xl border border-orange-500/30 p-4 shadow-lg shadow-orange-900/30 overflow-hidden"
                >
                  <div className="relative w-full h-[450px] rounded-2xl overflow-hidden">
                    <Image
                      src={activeService.image}
                      alt={activeService.imageAlt}
                      fill
                      priority={false}
                      loading="lazy"
                      className="object-cover object-center rounded-2xl hover:scale-105 transition-transform duration-700"
                    />
                  </div>
                  <div className="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                    <h4 className="text-2xl font-serif orange-gradient font-bold">{activeService.imageAlt}</h4>
                  </div>
                </motion.div>
              </motion.div>
            )}
          </AnimatePresence>
        </div>
      </section>
    </>
  )
}