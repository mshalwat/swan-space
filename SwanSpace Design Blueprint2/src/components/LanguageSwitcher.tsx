import { useLanguage } from '../lib/LanguageContext';
import { Globe } from 'lucide-react';

export function LanguageSwitcher() {
  const { language, setLanguage } = useLanguage();

  return (
    <div className="flex items-center gap-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full p-1 border border-purple-500/30">
      <button
        onClick={() => setLanguage('en')}
        className={`px-4 py-2 rounded-full transition-all duration-300 flex items-center gap-2 ${
          language === 'en'
            ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg'
            : 'text-gray-400 hover:text-white'
        }`}
      >
        <Globe size={16} />
        EN
      </button>
      <button
        onClick={() => setLanguage('de')}
        className={`px-4 py-2 rounded-full transition-all duration-300 flex items-center gap-2 ${
          language === 'de'
            ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg'
            : 'text-gray-400 hover:text-white'
        }`}
      >
        <Globe size={16} />
        DE
      </button>
    </div>
  );
}
