import { useState } from 'react';
import { TestimonialCard } from '../TestimonialCard';
import { ChevronLeft, ChevronRight } from 'lucide-react';
import { useLanguage } from '../../lib/LanguageContext';

export function Testimonials() {
  const { t } = useLanguage();
  const [currentIndex, setCurrentIndex] = useState(0);

  const next = () => {
    setCurrentIndex((prev) => (prev + 1) % t.testimonials.items.length);
  };

  const prev = () => {
    setCurrentIndex((prev) => (prev - 1 + t.testimonials.items.length) % t.testimonials.items.length);
  };

  return (
    <section className="py-20 relative">
      <div className="container-custom">
        <div className="text-center mb-16">
          <div className="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 mb-6">
            <span className="text-sm text-gray-300">{t.testimonials.badge}</span>
          </div>
          <h2 className="mb-6">
            {t.testimonials.title}{' '}
            <span className="text-gradient-nebula">
              {t.testimonials.titleHighlight}
            </span>
          </h2>
          <p className="text-xl text-gray-300 max-w-2xl mx-auto">
            {t.testimonials.description}
          </p>
        </div>

        {/* Desktop - Show 3 cards */}
        <div className="hidden md:grid md:grid-cols-3 gap-8 mb-12">
          {t.testimonials.items.map((testimonial, index) => (
            <TestimonialCard key={index} {...testimonial} />
          ))}
        </div>

        {/* Mobile - Carousel */}
        <div className="md:hidden relative">
          <div className="overflow-hidden">
            <div
              className="transition-transform duration-300 ease-in-out"
              style={{ transform: `translateX(-${currentIndex * 100}%)` }}
            >
              <div className="flex">
                {t.testimonials.items.map((testimonial, index) => (
                  <div key={index} className="w-full flex-shrink-0 px-4">
                    <TestimonialCard {...testimonial} />
                  </div>
                ))}
              </div>
            </div>
          </div>

          {/* Navigation */}
          <div className="flex justify-center gap-4 mt-8">
            <button
              onClick={prev}
              className="p-2 rounded-full glass-card border border-purple-500/30 hover:border-purple-500 transition-colors"
              aria-label="Previous testimonial"
            >
              <ChevronLeft size={24} className="text-purple-400" />
            </button>
            <button
              onClick={next}
              className="p-2 rounded-full glass-card border border-purple-500/30 hover:border-purple-500 transition-colors"
              aria-label="Next testimonial"
            >
              <ChevronRight size={24} className="text-purple-400" />
            </button>
          </div>

          {/* Dots */}
          <div className="flex justify-center gap-2 mt-4">
            {t.testimonials.items.map((_, index) => (
              <button
                key={index}
                onClick={() => setCurrentIndex(index)}
                className={`h-2 rounded-full transition-all ${
                  index === currentIndex 
                    ? 'bg-gradient-to-r from-purple-500 to-pink-500 w-8' 
                    : 'bg-gray-600 w-2'
                }`}
                aria-label={`Go to testimonial ${index + 1}`}
              />
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}