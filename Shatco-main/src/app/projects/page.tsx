'use client';

import { useState, useRef, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import Link from 'next/link';
import { projects, categories } from '../../components/sections/Projects';

export default function ProjectsPage() {
  const [activeCategory, setActiveCategory] = useState('All');
  const [filteredProjects, setFilteredProjects] = useState(projects);
  const projectsRef = useRef(null);

  useEffect(() => {
    if (activeCategory === 'All') {
      setFilteredProjects(projects);
    } else {
      setFilteredProjects(projects.filter(project => project.category === activeCategory));
    }
  }, [activeCategory]);

  const containerVariants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.1
      }
    }
  };

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
  };

  return (
    <div className="min-h-screen py-20 px-4 sm:px-6 lg:px-8" style={{ background: "linear-gradient(to bottom, #000000, #0a0a0a, #1a1200)" }}>
      <motion.div 
        className="max-w-7xl mx-auto"
        initial="hidden"
        animate="visible"
        variants={containerVariants}
      >
        <motion.div variants={itemVariants} className="mb-2">
          <Link href="/" className="text-orange hover:text-orange/80 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Home
          </Link>
        </motion.div>
        
        <motion.h1 
          className="text-4xl md:text-5xl font-bold mb-4 text-orange"
          variants={itemVariants}
        >
          Our Projects
        </motion.h1>
        
        <motion.p 
          className="text-xl text-gray-light mb-12 max-w-3xl"
          variants={itemVariants}
        >
          Explore our portfolio of successful projects across various industries. Each project showcases our commitment to excellence, innovation, and client satisfaction.
        </motion.p>
        
        {/* Category Filter */}
        <motion.div 
          className="mb-12 overflow-x-auto pb-4"
          variants={itemVariants}
        >
          <div className="flex space-x-2 md:space-x-4">
            {categories.map((category, index) => (
              <button
                key={index}
                onClick={() => setActiveCategory(category)}
                className={`px-4 py-2 rounded-full whitespace-nowrap transition-all duration-300 ${activeCategory === category ? 'bg-orange text-black font-medium' : 'bg-black text-white border border-orange/20 hover:border-orange/40'}`}
              >
                {category}
              </button>
            ))}
          </div>
        </motion.div>
        
        {/* Projects Grid */}
        <motion.div 
          className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
          variants={containerVariants}
          ref={projectsRef}
        >
          <AnimatePresence>
            {filteredProjects.map((project) => (
              <motion.div
                key={project.id}
                layout
                initial={{ opacity: 0, scale: 0.9 }}
                animate={{ opacity: 1, scale: 1 }}
                exit={{ opacity: 0, scale: 0.9 }}
                transition={{ duration: 0.3 }}
                className="bg-black rounded-lg overflow-hidden border border-orange/20 hover:border-orange/40 shadow-lg hover:shadow-orange/20 transition-all duration-300 flex flex-col h-full"
                whileHover={{ y: -5, transition: { duration: 0.2 } }}
              >
                <div 
                  className="aspect-[16/9] w-full"
                  style={{
                    backgroundImage: `url(${project.image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center'
                  }}
                ></div>
                
                <div className="p-6 flex flex-col flex-grow">
                  <div className="flex items-center mb-3">
                    <span className="text-xs font-medium bg-orange/10 text-orange px-2 py-1 rounded">
                      {project.category}
                    </span>
                    <span className="text-xs text-gray-light ml-auto">{project.year}</span>
                  </div>
                  
                  <h3 className="text-xl font-bold mb-2 text-orange">{project.title}</h3>
                  <p className="text-gray-light mb-4 flex-grow">{project.description}</p>
                  
                  <div className="flex items-center justify-between mt-auto">
                    <span className="text-sm text-gray-light">{project.location}</span>
                    <Link 
                      href={`/projects/${project.id}`}
                      className="text-orange hover:text-orange/80 inline-flex items-center font-medium"
                    >
                      View Details
                      <svg xmlns="http://www.w3.org/2000/svg" className="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                      </svg>
                    </Link>
                  </div>
                </div>
              </motion.div>
            ))}
          </AnimatePresence>
        </motion.div>
        
        {filteredProjects.length === 0 && (
          <motion.div 
            className="text-center py-12"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ delay: 0.3 }}
          >
            <h3 className="text-xl font-medium text-orange mb-2">No projects found</h3>
            <p className="text-gray-light">Try selecting a different category</p>
          </motion.div>
        )}
        
        <motion.div 
          className="mt-16 text-center"
          variants={itemVariants}
        >
          <h2 className="text-2xl font-bold mb-6 text-orange">Ready to Start Your Project?</h2>
          <p className="text-gray-light mb-8 max-w-2xl mx-auto">
            Our team of experts is ready to help you bring your vision to life. Contact us today to discuss your project requirements.
          </p>
          <Link 
            href="/#contact"
            className="btn-primary inline-block text-black bg-orange hover:bg-orange-dark"
          >
            Get in Touch
          </Link>
        </motion.div>
      </motion.div>
    </div>
  );
}