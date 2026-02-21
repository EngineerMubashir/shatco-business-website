"use client";

import { motion } from "framer-motion";
import Link from "next/link";
import Image from "next/image";

export default function ServiceDetails({ service }) {
  const containerVariants = {
    hidden: { opacity: 0 },
    visible: { opacity: 1, transition: { staggerChildren: 0.1 } },
  };

  const itemVariants = {
    hidden: { y: 20, opacity: 0 },
    visible: { y: 0, opacity: 1, transition: { type: "spring", stiffness: 100 } },
  };

  return (
    <div className="min-h-screen py-20 px-4 sm:px-6 lg:px-8" style={{ background: "linear-gradient(to bottom, #000000, #0a0a0a, #1a1200)" }}>
      <motion.div className="max-w-7xl mx-auto" initial="hidden" animate="visible" variants={containerVariants}>

        <div className="mb-16">
          <motion.div variants={itemVariants} className="mb-2">
            <Link href="/#products-services" className="text-orange hover:text-orange/80 inline-flex items-center">
              ← Back to Services
            </Link>
          </motion.div>

          <motion.h1 className="text-4xl md:text-5xl font-bold mb-4 text-orange" variants={itemVariants}>
            {service.content.title}
          </motion.h1>

          <motion.p className="text-xl mb-8 text-gray-light max-w-3xl" variants={itemVariants}>
            {service.content.description}
          </motion.p>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-3 gap-12">
          <motion.div className="lg:col-span-2 order-2 lg:order-1" variants={itemVariants}>
            <h2 className="text-2xl font-bold mb-6 text-orange">Our Approach</h2>
            <p className="text-gray-light mb-6">At SHATCO, we take a comprehensive approach...</p>

            <h2 className="text-2xl font-bold mb-6 text-orange mt-12">Key Services</h2>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              {service.content.services.map((item, index) => (
                <motion.div key={index} className="bg-black p-6 rounded-lg border border-orange/20"
                  initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: index * 0.1 }}
                  whileHover={{ y: -5, borderColor: "rgba(255,165,0,.5)" }}
                >
                  <h3 className="text-xl font-bold mb-3 text-orange">{item.title}</h3>
                  <p className="text-gray-300">{item.description}</p>
                </motion.div>
              ))}
            </div>

            <motion.div className="mt-12" variants={itemVariants}>
              <Link href="/#contact" className="btn-primary text-black bg-orange px-5 py-3 rounded-lg">
                Request a Consultation
              </Link>
            </motion.div>
          </motion.div>

          <motion.div className="lg:col-span-1 order-1 lg:order-2" variants={itemVariants}>
            <div className="sticky top-24">
              <div className="rounded-tr-3xl rounded-bl-3xl overflow-hidden mb-8">
                <Image src={service.content.image} alt={service.content.imageAlt} width={600} height={450} className="w-full h-auto object-cover" />
              </div>
            </div>
          </motion.div>
        </div>

      </motion.div>
    </div>
  );
}
