import { LucideIcon } from 'lucide-react';
import { Button } from './ui/button';
import { useLanguage } from '../lib/LanguageContext';

interface ServiceCardProps {
  icon: LucideIcon;
  title: string;
  description: string;
  className?: string;
}

export function ServiceCard({ icon: Icon, title, description, className = '' }: ServiceCardProps) {
  const { t } = useLanguage();
  
  return (
    <div className={`card-3d glass-card rounded-2xl p-8 border border-purple-500/30 hover:border-purple-500 hover:shadow-2xl hover:shadow-purple-500/30 transition-all duration-500 ${className}`}>
      <div className="relative mb-6">
        <div className="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur-xl opacity-50"></div>
        <div className="relative w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-600 via-pink-500 to-cyan-500 flex items-center justify-center">
          <Icon className="w-8 h-8 text-white" />
        </div>
      </div>
      <h4 className="mb-4 text-white">{title}</h4>
      <p className="text-gray-300 mb-6 leading-relaxed">{description}</p>
      <Button variant="ghost" className="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 hover:from-purple-300 hover:to-pink-300 p-0 h-auto group">
        {t.services.learnMore} 
        <span className="inline-block group-hover:translate-x-1 transition-transform ml-1">→</span>
      </Button>
    </div>
  );
}