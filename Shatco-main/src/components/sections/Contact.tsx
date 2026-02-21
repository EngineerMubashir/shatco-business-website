'use client'

import { useRef, useState } from 'react'
import { motion } from 'framer-motion'

const Contact = () => {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: '',
  })
  const [isSubmitting, setIsSubmitting] = useState(false)
  const [isSubmitted, setIsSubmitted] = useState(false)

  const ref = useRef(null)

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>) => {
    const { name, value } = e.target
    setFormData(prev => ({ ...prev, [name]: value }))
  }

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    setIsSubmitting(true)

    await new Promise(res => setTimeout(res, 1500))

    setIsSubmitting(false)
    setIsSubmitted(true)
    setFormData({ name: '', email: '', phone: '', subject: '', message: '' })
    setTimeout(() => setIsSubmitted(false), 4000)
  }

  const variants = {
    hidden: { opacity: 0, y: 30 },
    visible: { opacity: 1, y: 0, transition: { duration: 0.6, ease: 'easeOut' } },
  }

  return (
    <section id="contact" className="py-24 relative overflow-hidden bg-black-dark border-t border-orange/10">
      {/* Decorative Glow */}
      <div className="absolute top-0 left-0 w-1/3 h-1/3 bg-orange/5 blur-[100px] rounded-full" />
      <div className="absolute bottom-0 right-0 w-1/2 h-1/2 bg-orange/5 blur-[150px] rounded-full" />

      <div className="container-custom relative z-10">
        {/* Section Header */}
        <motion.div
          ref={ref}
          variants={variants}
          initial="hidden"
          animate="visible"
          className="text-center mb-16"
        >
          <span className="text-orange uppercase tracking-widest font-medium">Get In Touch</span>
          <h2 className="text-4xl md:text-5xl font-bold text-white mt-4 mb-6">
            Contact <span className="text-orange">Us</span>
          </h2>
          <p className="text-gray-300 max-w-3xl mx-auto">
            Ready to elevate your business? Contact us today to discuss how our premium solutions
            can help you achieve your goals and exceed expectations.
          </p>
        </motion.div>

        {/* Grid Layout */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
          {/* Form Section */}
          <motion.div variants={variants} initial="hidden" animate="visible">
            <h3 className="text-2xl font-semibold text-white mb-4">Send Us a Message</h3>
            <p className="text-gray-400 mb-8">
              Fill out the form below and our team will get back to you promptly.
            </p>

            <form onSubmit={handleSubmit} className="space-y-6">
              {/* Name + Email */}
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label htmlFor="name" className="text-sm text-gray-300 block mb-2">Full Name</label>
                  <input
                    id="name"
                    name="name"
                    type="text"
                    value={formData.name}
                    onChange={handleChange}
                    required
                    placeholder="John Doe"
                    className="w-full bg-black-light border border-orange/20 text-white px-4 py-3 rounded-sm focus:outline-none focus:border-orange transition"
                  />
                </div>
                <div>
                  <label htmlFor="email" className="text-sm text-gray-300 block mb-2">Email Address</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    value={formData.email}
                    onChange={handleChange}
                    required
                    placeholder="john@example.com"
                    className="w-full bg-black-light border border-orange/20 text-white px-4 py-3 rounded-sm focus:outline-none focus:border-orange transition"
                  />
                </div>
              </div>

              {/* Phone + Subject */}
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label htmlFor="phone" className="text-sm text-gray-300 block mb-2">Phone Number</label>
                  <input
                    id="phone"
                    name="phone"
                    type="tel"
                    value={formData.phone}
                    onChange={handleChange}
                    placeholder="+966 548120246"
                    className="w-full bg-black-light border border-orange/20 text-white px-4 py-3 rounded-sm focus:outline-none focus:border-orange transition"
                  />
                </div>
                <div>
                  <label htmlFor="subject" className="text-sm text-gray-300 block mb-2">Subject</label>
                  <select
                    id="subject"
                    name="subject"
                    value={formData.subject}
                    onChange={handleChange}
                    required
                    className="w-full bg-black-light border border-orange/20 text-white px-4 py-3 rounded-sm focus:outline-none focus:border-orange transition"
                  >
                    <option value="" disabled>Select a subject</option>
                    <option value="General Inquiry">General Inquiry</option>
                    <option value="Project Consultation">Project Consultation</option>
                    <option value="Partnership Opportunity">Partnership Opportunity</option>
                    <option value="Support Request">Support Request</option>
                  </select>
                </div>
              </div>

              {/* Message */}
              <div>
                <label htmlFor="message" className="text-sm text-gray-300 block mb-2">Message</label>
                <textarea
                  id="message"
                  name="message"
                  value={formData.message}
                  onChange={handleChange}
                  required
                  rows={5}
                  placeholder="Tell us about your project or inquiry..."
                  className="w-full bg-black-light border border-orange/20 text-white px-4 py-3 rounded-sm focus:outline-none focus:border-orange transition"
                />
              </div>

              {/* Submit Button */}
              <div>
                <button
                  type="submit"
                  disabled={isSubmitting}
                  className="bg-orange text-black-dark px-6 py-3 rounded-sm hover:bg-orange/90 transition w-full font-semibold"
                >
                  {isSubmitting ? 'Sending...' : 'Send Message'}
                </button>

                {isSubmitted && (
                  <motion.div
                    initial={{ opacity: 0, y: 10 }}
                    animate={{ opacity: 1, y: 0 }}
                    className="mt-4 p-3 bg-orange/20 border border-orange/30 text-orange rounded-sm text-center"
                  >
                    ✅ Thank you! Your message has been sent successfully.
                  </motion.div>
                )}
              </div>
            </form>
          </motion.div>

          {/* Contact Info Section */}
          <motion.div variants={variants} initial="hidden" animate="visible">
            <h3 className="text-2xl font-semibold text-white mb-4">Contact Information</h3>
            <p className="text-gray-400 mb-8">Reach out to us directly or visit our office.</p>
            {/* Add location, email, call info here if needed */}
          </motion.div>
        </div>
      </div>
    </section>
  )
}

export default Contact