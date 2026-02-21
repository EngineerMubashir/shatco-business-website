"use client";

import { motion } from "framer-motion";
import Link from "next/link";

type ProjectType = {
  id: number;
  title: string;
  category: string;
  location: string;
  description: string;
  image: string;
  year: string;
};

export default function ProjectDetails({ project }: { project: ProjectType }) {
  return (
    <div className="min-h-screen py-20 px-4 sm:px-6 lg:px-8" style={{ background: "linear-gradient(to bottom, #000000, #0a0a0a, #1a1200)" }}>
      <motion.div className="max-w-7xl mx-auto" initial={{ opacity: 0 }} animate={{ opacity: 1 }}>
        
        <div className="mb-8">
          <Link href="/projects" className="text-orange hover:text-orange/80 inline-flex items-center gap-2">
            ← Back to Projects
          </Link>
        </div>

        <h1 className="text-4xl md:text-5xl font-bold text-orange mb-6">{project.title}</h1>

        <p className="text-gray-light mb-10">
          {project.fullDescription ?? project.description}
        </p>

        <div className="rounded-lg overflow-hidden mb-10">
          <img src={project.image} alt={project.title} className="w-full object-cover" />
        </div>

        <Link href="/#contact" className="btn-primary text-black bg-orange px-5 py-3 rounded-lg">
          Discuss Your Project
        </Link>

      </motion.div>
    </div>
  );
}
