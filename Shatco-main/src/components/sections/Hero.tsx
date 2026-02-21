'use client'

import dynamic from 'next/dynamic'
import Link from 'next/link'
import { useRef } from 'react'
import { useInView } from 'framer-motion'

// Lazy load framer-motion
const MotionDiv = dynamic(() => import('framer-motion').then(mod => mod.motion.div), { ssr: false })
const MotionSpan = MotionDiv
const MotionH1 = MotionDiv
const MotionP = MotionDiv

const Hero = () => {
  const ref = useRef(null)
  const isInView = useInView(ref, { once: true, margin: '-100px 0px' })

  const variants = {
    hidden: { opacity: 0, y: 30 },
    visible: (delay: number = 0) => ({
      opacity: 1,
      y: 0,
      transition: { duration: 0.8, delay, ease: 'easeOut' },
    }),
  }

  return (
    <section
      id="hero"
      ref={ref}
      className="relative min-h-screen flex items-center pt-24 pb-16 overflow-hidden bg-gradient-to-b from-black via-gray-900 to-black text-white"
      aria-label="Hero Section"
    >
      {/* --- Soft background glow --- */}
      <div className="absolute inset-0 z-0">
        <div className="absolute top-1/3 left-1/3 w-72 h-72 bg-orange-500/20 blur-[100px] rounded-full" />
        <div className="absolute bottom-1/3 right-1/3 w-96 h-96 bg-orange-400/10 blur-[120px] rounded-full" />
      </div>

      {/* --- Subtle Grid --- */}
      <div className="absolute inset-0 z-0 opacity-10">
        <div
          className="h-full w-full"
          style={{
            backgroundImage:
              'linear-gradient(to right, rgba(255,255,255,0.08) 1px, transparent 1px), linear-gradient(to bottom, rgba(255,255,255,0.08) 1px, transparent 1px)',
            backgroundSize: '50px 50px',
          }}
        />
      </div>

      {/* --- Main content --- */}
      <div className="container-custom relative z-10">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          
          {/* --- LEFT: Text Content --- */}
          <div>
            <MotionSpan
              variants={variants}
              initial="hidden"
              animate={isInView ? 'visible' : 'hidden'}
              className="text-orange uppercase tracking-widest font-medium mb-4 block"
            >
              Welcome to SHATCO
            </MotionSpan>

            <MotionH1
              variants={variants}
              custom={0.2}
              initial="hidden"
              animate={isInView ? 'visible' : 'hidden'}
              className="heading-xl mb-6"
            >
              Your <span className="orange-gradient">Strategic Partner</span> in Excellence
            </MotionH1>

            <MotionP
              variants={variants}
              custom={0.4}
              initial="hidden"
              animate={isInView ? 'visible' : 'hidden'}
              className="text-lg text-gray-300 mb-8 max-w-lg"
            >
              At SHATCO, we are passionate about delivering top-tier solutions in Power, Renewable
              Energy (Solar), MEP, Low Current, and ICT. Our commitment to innovation ensures that we
              exceed expectations through cutting-edge technology and superior service.
            </MotionP>

            <MotionDiv
              variants={variants}
              custom={0.6}
              initial="hidden"
              animate={isInView ? 'visible' : 'hidden'}
              className="flex flex-wrap gap-4"
            >
              <Link href="#products-services" className="btn-primary">
                Explore Services
              </Link>
              <Link href="#about" className="btn-outline">
                Learn More
              </Link>
            </MotionDiv>
          </div>

          {/* --- RIGHT: Animated SHATCO Frame --- */}
          <MotionDiv
            variants={{
              hidden: { opacity: 0, scale: 0.9 },
              visible: { opacity: 1, scale: 1, transition: { duration: 1.2, delay: 0.3 } },
            }}
            initial="hidden"
            animate={isInView ? 'visible' : 'hidden'}
            className="relative flex justify-center items-center"
          >
            <div className="relative w-full max-w-lg aspect-square rounded-tr-3xl rounded-bl-3xl overflow-hidden shadow-2xl flex flex-col items-center justify-center">
              
              {/* Animated Gradient Background */}
              <MotionDiv
                className="absolute inset-0"
                animate={{
                  background: [
                    'linear-gradient(135deg, rgba(255,126,95,0.3), rgba(255,180,123,0.2))',
                    'linear-gradient(135deg, rgba(255,153,102,0.3), rgba(255,94,98,0.2))',
                    'linear-gradient(135deg, rgba(255,126,95,0.3), rgba(255,180,123,0.2))',
                  ],
                }}
                transition={{ duration: 10, repeat: Infinity, repeatType: 'mirror' }}
              />

              <div className="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/40" />

              {/* Text content inside frame */}
              <div className="relative z-10 text-center flex flex-col items-center justify-center">
                <div className="text-6xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-yellow-300 drop-shadow-lg mb-3">
                  SHATCO
                </div>
                <div className="text-xl md:text-2xl font-serif text-gray-200 shimmer-text">
                  مؤسسة شموخ التقدم للمقاولات
                </div>
              </div>

              {/* Decorative borders */}
              <div className="absolute -top-4 -left-4 w-24 h-24 border-t-2 border-l-2 border-orange-400/60 rounded-tl-3xl" />
              <div className="absolute -bottom-4 -right-4 w-24 h-24 border-b-2 border-r-2 border-orange-400/60 rounded-br-3xl" />
            </div>
          </MotionDiv>
        </div>
      </div>

      {/* --- Scroll Indicator --- */}
      <div className="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center">
        <MotionSpan
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 1, delay: 1.2 }}
          className="text-orange text-sm mb-2"
        >
          Scroll Down
        </MotionSpan>
        <MotionDiv
          initial={{ height: 0, opacity: 0 }}
          animate={{ height: 40, opacity: 1 }}
          transition={{ duration: 1, delay: 1.4 }}
          className="w-0.5 bg-orange/50 overflow-hidden"
        >
          <MotionDiv
            className="w-full h-full bg-orange"
            animate={{ y: [0, 40, 0] }}
            transition={{ duration: 1.5, repeat: Infinity, ease: 'easeInOut' }}
          />
        </MotionDiv>
      </div>

      {/* Shimmer effect for Arabic text */}
      <style jsx>{`
        .shimmer-text {
          background: linear-gradient(
            90deg,
            rgba(255, 255, 255, 0.3) 0%,
            rgba(255, 255, 255, 0.8) 50%,
            rgba(255, 255, 255, 0.3) 100%
          );
          background-size: 200% 100%;
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          animation: shimmer 4s infinite linear;
        }

        @keyframes shimmer {
          0% {
            background-position: -200% 0;
          }
          100% {
            background-position: 200% 0;
          }
        }
      `}</style>
    </section>
  )
}

export default Hero