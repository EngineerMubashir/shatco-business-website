'use client'

import Link from 'next/link'
import { useState } from 'react'

const Header = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false)
  const [isServicesOpenDesktop, setIsServicesOpenDesktop] = useState(false)
  const [isServicesOpenMobile, setIsServicesOpenMobile] = useState(false)

  const services = [
    { name: 'Power Solutions', href: '/services/power-solutions' },
    { name: 'Low Current Solutions', href: '/services/low-current' },
    { name: 'ICT Solutions', href: '/services/ict-solutions' },
    { name: 'IoT Solutions', href: '/services/iot-solutions' },
    { name: 'MEP Services', href: '/services/mep-services' },
    { name: 'Solar Solutions', href: '/services/solar-solutions' },
    { name: 'Telecom Services', href: '/services/telecom-services' },
  ]

  return (
    <header className="fixed top-0 left-0 w-full z-50 bg-black-dark/90 backdrop-blur-md border-b border-gray-700">
      <div className="container-custom flex justify-between items-center py-4">
        {/* Logo */}
        <Link href="/" className="text-2xl font-bold text-orange">
          SHATCO
        </Link>

        {/* Desktop Menu */}
        <nav className="hidden md:flex space-x-6 items-center">
          <Link href="/" className="hover:text-orange transition-colors">
            Home
          </Link>
          <Link href="/#about" className="hover:text-orange transition-colors">
            About
          </Link>

          {/* Products & Services Dropdown */}
          <div className="relative">
            <div className="flex items-center gap-2">
              <Link href="/services" className="hover:text-orange transition-colors">
                Products & Services
              </Link>
              <button
                aria-label="Toggle services menu"
                className={`hover:text-orange transition-transform ${isServicesOpenDesktop ? 'rotate-180' : 'rotate-0'}`}
                onClick={() => setIsServicesOpenDesktop(!isServicesOpenDesktop)}
              >
                &#9662;
              </button>
            </div>

            {isServicesOpenDesktop && (
              <div className="absolute top-full left-0 mt-2 w-56 bg-black-dark border border-gray-700 rounded shadow-lg flex flex-col">
                {services.map((service) => (
                  <Link
                    key={service.href}
                    href={service.href}
                    className="px-4 py-2 hover:bg-orange/10 transition-colors"
                  >
                    {service.name}
                  </Link>
                ))}
              </div>
            )}
          </div>

          <Link href="/#projects" className="hover:text-orange transition-colors">
            Projects
          </Link>
          <Link href="/#contact" className="hover:text-orange transition-colors">
            Contact
          </Link>
        </nav>

        {/* Mobile Menu Button */}
        <div className="md:hidden">
          <button onClick={() => setIsMenuOpen(!isMenuOpen)} className="text-orange text-2xl">
            &#9776;
          </button>
        </div>
      </div>

      {/* Mobile Menu */}
      {isMenuOpen && (
        <div className="md:hidden bg-black-dark border-t border-gray-700">
          <nav className="flex flex-col space-y-2 py-4 px-6">
            <Link href="/" onClick={() => setIsMenuOpen(false)} className="hover:text-orange transition-colors">
              Home
            </Link>
            <Link href="/#about" onClick={() => setIsMenuOpen(false)} className="hover:text-orange transition-colors">
              About
            </Link>

            {/* Mobile Products & Services */}
            <div className="py-2">
              <div className="w-full flex items-center justify-between">
                <Link
                  href="/services"
                  onClick={() => setIsMenuOpen(false)}
                  className="hover:text-orange transition-colors"
                >
                  Products & Services
                </Link>
                <button
                  aria-label="Toggle services menu"
                  className={`hover:text-orange transition-transform ${isServicesOpenMobile ? 'rotate-180' : 'rotate-0'}`}
                  onClick={() => setIsServicesOpenMobile(!isServicesOpenMobile)}
                >
                  &#9662;
                </button>
              </div>

              {isServicesOpenMobile && (
                <div className="flex flex-col pl-4 mt-2 space-y-1">
                  {services.map((service) => (
                    <Link
                      key={service.href}
                      href={service.href}
                      onClick={() => setIsMenuOpen(false)}
                      className="hover:text-orange transition-colors"
                    >
                      {service.name}
                    </Link>
                  ))}
                </div>
              )}
            </div>

            <Link href="/#projects" onClick={() => setIsMenuOpen(false)} className="hover:text-orange transition-colors">
              Projects
            </Link>
            <Link href="/#contact" onClick={() => setIsMenuOpen(false)} className="hover:text-orange transition-colors">
              Contact
            </Link>
          </nav>
        </div>
      )}
    </header>
  )
}

export default Header
