import { CheckCircle } from 'lucide-react';
import { useLanguage } from '../../lib/LanguageContext';

export function AboutIntro() {
  const { t } = useLanguage();

  return (
    <section className="py-20 relative">
      <div className="container-custom">
        <div className="max-w-4xl mx-auto">
          <div className="text-center mb-12">
            <div className="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 mb-6">
              <span className="text-sm text-gray-300">{t.aboutIntro.badge}</span>
            </div>
            <h2 className="mb-6">
              {t.aboutIntro.title}{' '}
              <span className="text-gradient-nebula">
                {t.aboutIntro.titleHighlight}
              </span>
            </h2>
          </div>

          <div className="prose prose-lg max-w-none mb-12">
            <p className="text-gray-300 text-center leading-relaxed text-lg">
              {t.aboutIntro.description}
            </p>
          </div>

          <div className="grid sm:grid-cols-2 gap-4 max-w-2xl mx-auto">
            {t.aboutIntro.highlights.map((highlight, index) => (
              <div key={index} className="flex items-center gap-3 glass-card p-4 rounded-xl border border-purple-500/20 hover:border-purple-500/50 transition-all">
                <CheckCircle className="text-cyan-400 shrink-0" size={24} />
                <span className="text-gray-300">{highlight}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}