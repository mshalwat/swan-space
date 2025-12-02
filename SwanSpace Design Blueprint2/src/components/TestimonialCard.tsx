import { ImageWithFallback } from './figma/ImageWithFallback';
import { Quote } from 'lucide-react';

interface TestimonialCardProps {
  quote: string;
  author: string;
  role: string;
  school: string;
  imageUrl?: string;
}

export function TestimonialCard({ quote, author, role, school, imageUrl }: TestimonialCardProps) {
  return (
    <div className="card-3d glass-card rounded-2xl p-8 border border-purple-500/30 hover:border-purple-500 h-full flex flex-col transition-all duration-500">
      <Quote className="w-10 h-10 text-cyan-400 mb-6" />
      <p className="text-gray-300 mb-6 flex-grow italic leading-relaxed">"{quote}"</p>
      <div className="flex items-center gap-4 pt-6 border-t border-purple-500/20">
        <div className="relative w-14 h-14 rounded-full flex-shrink-0 overflow-hidden">
          <div className="absolute inset-0 bg-gradient-to-br from-purple-600 to-pink-600 blur-lg opacity-75"></div>
          <div className="relative w-full h-full bg-gradient-to-br from-purple-600 via-pink-500 to-cyan-500 flex items-center justify-center">
            {imageUrl ? (
              <ImageWithFallback
                src={imageUrl}
                alt={author}
                className="w-full h-full object-cover"
              />
            ) : (
              <span className="text-white text-xl font-bold">{author.charAt(0)}</span>
            )}
          </div>
        </div>
        <div>
          <p className="text-white font-semibold">{author}</p>
          <p className="text-gray-400 text-sm">{role}</p>
          <p className="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 text-sm">
            {school}
          </p>
        </div>
      </div>
    </div>
  );
}