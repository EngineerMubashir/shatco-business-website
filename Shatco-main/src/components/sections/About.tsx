  'use client'

  import { useRef } from 'react'
  import { motion, useInView } from 'framer-motion'
  import Image from 'next/image'

  const About = () => {
    const ref = useRef(null)
    const isInView = useInView(ref, { once: true, margin: '-100px 0px' })

    const containerVariants = {
      hidden: { opacity: 0 },
      visible: {
        opacity: 1,
        transition: { staggerChildren: 0.15, delayChildren: 0.2, duration: 0.8, ease: 'easeOut' },
      },
    }

    const itemVariants = {
      hidden: { opacity: 0, y: 30 },
      visible: { opacity: 1, y: 0, transition: { duration: 0.8, ease: 'easeOut' } },
    }

    return (
      <section
        id="about"
        className="relative py-24 overflow-hidden min-h-screen bg-gradient-to-br from-black via-[#1a0e00] to-[#2b0f00] text-gray-100"
      >
        {/* 🔸 Background Glow (like Hero section) */}
        <div className="absolute inset-0 z-0">
          <div className="absolute top-1/4 left-1/3 w-96 h-96 bg-orange-500/20 blur-[130px] rounded-full" />
          <div className="absolute bottom-1/4 right-1/4 w-[28rem] h-[28rem] bg-orange-600/10 blur-[120px] rounded-full" />
        </div>

        <div className="container-custom relative z-10">
          <motion.div
            ref={ref}
            variants={containerVariants}
            initial="hidden"
            animate={isInView ? 'visible' : 'hidden'}
            className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center"
          >
            {/* 🔹 Left Image Section inside glow container */}
            <motion.div variants={itemVariants} className="relative group">
              <div className="relative bg-gradient-to-tr from-orange-900/40 via-orange-800/20 to-transparent rounded-3xl border border-orange-500/30 p-4 shadow-lg shadow-orange-900/30 overflow-hidden">
                <div className="relative w-full h-[550px] rounded-2xl overflow-hidden">
                  <Image
                    src="/solar.webp"
                    alt="Solar panels with modern city background"
                    fill
                    priority={false}
                    loading="lazy"
                    className="object-cover rounded-2xl group-hover:scale-105 transition-transform duration-700"
                  />
                </div>

                {/* Overlay text box */}
                <div className="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                  <h3 className="text-4xl font-serif font-bold orange-gradient mb-2">SHATCO</h3>
                  <p className="text-gray-300 text-lg">Renewable Energy Solutions</p>
                </div>
              </div>
            </motion.div>

            {/* 🔹 Right Content Section */}
            <motion.div variants={itemVariants}>
              <span className="text-orange uppercase tracking-widest font-medium">About Us</span>

              <h2 className="heading-lg mt-4 mb-6 text-gray-100">
                Your Strategic <span className="orange-gradient">Partner</span> in Excellence
              </h2>

              <p className="text-gray-300 mb-6">
                At SHATCO, we deliver top-tier Power, Solar, MEP, Low Current, and ICT solutions.
                Innovation and precision drive every project to exceed your expectations.
              </p>

              <h3 className="text-xl font-bold text-orange mt-8 mb-4">Our Key Strengths</h3>

              <div className="space-y-6 mb-8">
                {[
                  {
                    title: 'Expert Team',
                    desc: 'Our professionals ensure a customer-centric approach with years of experience and dedication.',
                    icon: (
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z"
                      />
                    ),
                  },
                  {
                    title: 'Versatility',
                    desc: 'A skilled and adaptive team that can handle complex projects with innovation and precision.',
                    icon: (
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2H4V5z"
                      />
                    ),
                  },
                  {
                    title: 'Safety First',
                    desc: 'We follow strict OHS standards to ensure safe and successful project environments.',
                    icon: (
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M9 12l2 2 4-4"
                      />
                    ),
                  },
                ].map((item, i) => (
                  <div key={i} className="flex gap-4">
                    <div className="flex-shrink-0 w-12 h-12 rounded-full bg-orange/20 flex items-center justify-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-6 w-6 text-orange"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        {item.icon}
                      </svg>
                    </div>
                    <div>
                      <h4 className="text-lg font-bold text-gray-100">{item.title}</h4>
                      <p className="text-gray-300">{item.desc}</p>
                    </div>
                  </div>
                ))}
              </div>
            </motion.div>
          </motion.div>
        </div>
      </section>
    )
  }

  export default About