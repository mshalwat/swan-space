import { ImageWithFallback } from './figma/ImageWithFallback';
import { Button } from './ui/button';
import { ArrowRight } from 'lucide-react';

interface CaseStudyCardProps {
  title: string;
  description: string;
  imageUrl: string;
  tags: string[];
  stats?: { label: string; value: string }[];
}

export function CaseStudyCard({ title, description, imageUrl, tags, stats }: CaseStudyCardProps) {
  return (
    <div className="bg-white rounded-2xl overflow-hidden shadow-[0_2px_8px_rgba(0,0,0,0.08)] hover:shadow-[0_8px_32px_rgba(0,0,0,0.15)] transition-all duration-300">
      <div className="aspect-[16/9] bg-gradient-to-br from-[#8EC5FC] to-[#E0C3FC] overflow-hidden">
        <ImageWithFallback
          src={imageUrl}
          alt={title}
          className="w-full h-full object-cover"
        />
      </div>
      <div className="p-8">
        <div className="flex flex-wrap gap-2 mb-4">
          {tags.map((tag) => (
            <span
              key={tag}
              className="px-3 py-1 bg-[#F9FAFB] text-[#5FA8D3] rounded-full text-sm"
            >
              {tag}
            </span>
          ))}
        </div>
        <h4 className="mb-3 text-[#0F172A]">{title}</h4>
        <p className="text-[#475569] mb-6">{description}</p>
        
        {stats && stats.length > 0 && (
          <div className="grid grid-cols-3 gap-4 mb-6 pt-6 border-t border-[#E2E8F0]">
            {stats.map((stat, index) => (
              <div key={index}>
                <p className="text-2xl text-[#5FA8D3] mb-1">{stat.value}</p>
                <p className="text-[#94A3B8] text-sm">{stat.label}</p>
              </div>
            ))}
          </div>
        )}
        
        <Button variant="outline" className="group border-[#5FA8D3] text-[#5FA8D3] hover:bg-[#5FA8D3] hover:text-white rounded-full">
          View Case Study
          <ArrowRight className="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" />
        </Button>
      </div>
    </div>
  );
}
