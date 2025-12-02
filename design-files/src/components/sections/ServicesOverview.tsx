import { Globe, Smartphone, Database, LineChart, Settings, Users } from 'lucide-react';
import { ServiceCard } from '../ServiceCard';
import { useLanguage } from '../../lib/LanguageContext';

export function ServicesOverview() {
  const { t } = useLanguage();
  
  const serviceIcons = [Globe, Smartphone, Database, LineChart, Settings, Users];

  return (
    <section id="services" className="py-20 relative">
      <div className="container-custom">
        <div className="text-center mb-16">
          <div className="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 mb-6">
            <span className="text-sm text-gray-300">{t.services.badge}</span>
          </div>
          <h2 className="mb-6">
            {t.services.title}{' '}
            <span className="text-gradient-cosmic">
              {t.services.titleHighlight}
            </span>
          </h2>
          <p className="text-xl text-gray-300 max-w-2xl mx-auto">
            {t.services.description}
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          {t.services.items.map((service, index) => (
            <ServiceCard key={index} icon={serviceIcons[index]} {...service} />
          ))}
        </div>
      </div>
    </section>
  );
}