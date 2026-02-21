'use client'

import Link from 'next/link'
import { motion } from 'framer-motion'

const Footer = () => {
  const currentYear = new Date().getFullYear()

  const fadeUp = {
    hidden: { opacity: 0, y: 30 },
    visible: { opacity: 1, y: 0, transition: { duration: 0.6, ease: 'easeOut' } },
  }

  const socialLinks = [
    { name: 'LinkedIn', href: '#' },
    { name: 'Twitter', href: '#' },
    { name: 'Instagram', href: '#' },
    { name: 'Facebook', href: '#' },
  ]

  return (
    <footer className="relative overflow-hidden pt-16 pb-8 bg-black-dark text-gray-400">
      <div className="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-orange/50 to-transparent z-0" />
      <div className="absolute bottom-0 right-0 w-1/3 h-1/3 bg-orange/5 blur-[120px] rounded-full z-0" />

      <div className="container-custom relative z-10">
        <motion.div variants={fadeUp} initial="hidden" whileInView="visible" viewport={{ once: true }}>
          <div className="flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
            <Link href="/" className="text-4xl font-extrabold bg-gradient-to-r from-[#ff8c00] via-[#ffb84d] to-[#ffa500] text-transparent bg-clip-text tracking-widest mb-4">
              SHATCO
            </Link>

            <div className="flex space-x-4">
              {socialLinks.map((social) => (
                <a
                  key={social.name}
                  href={social.href}
                  className="w-10 h-10 rounded-sm bg-black-light border border-orange/20 flex items-center justify-center text-orange hover:bg-orange hover:text-black-dark transition-colors duration-300"
                >
                  {social.name[0]}
                </a>
              ))}
            </div>
          </div>

          <div className="pt-8 border-t border-orange/10 flex flex-col md:flex-row justify-between items-center">
            <p className="text-gray-500 text-sm mb-4 md:mb-0">&copy; {currentYear} SHATCO. All rights reserved.</p>
            <div className="flex flex-wrap justify-center gap-x-8 gap-y-2 text-sm text-gray-500">
              <Link href="#terms" className="hover:text-orange transition-colors duration-300">Terms of Service</Link>
              <Link href="#privacy" className="hover:text-orange transition-colors duration-300">Privacy Policy</Link>
              <Link href="#cookies" className="hover:text-orange transition-colors duration-300">Cookie Policy</Link>
            </div>
          </div>
        </motion.div>
      </div>
    </footer>
  )
}

export default Footer